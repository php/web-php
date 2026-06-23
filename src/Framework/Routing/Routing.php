<?php

namespace phpweb\Framework\Routing;

use Error;
use phpweb\Framework\Build\BuildContext;
use phpweb\Framework\Build\BuildStep;
use phpweb\Framework\Build\BuildStepFailureException;
use phpweb\Framework\Build\BuildTools;
use phpweb\Framework\Build\ReflectionHelpers;
use phpweb\Framework\IO\FS;
use phpweb\Framework\Routing\Route as RouteAttribute;
use phpweb\Framework\Services\Service;
use phpweb\ProjectGlobals;
use ReflectionClass;
use ReflectionException;
use Stringable;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Exception\MethodNotAllowedException;
use Symfony\Component\Routing\Exception\ResourceNotFoundException;
use Symfony\Component\Routing\Matcher\CompiledUrlMatcher;
use Symfony\Component\Routing\Matcher\Dumper\CompiledUrlMatcherDumper;
use Symfony\Component\Routing\RequestContext;
use Symfony\Component\Routing\Route;
use Symfony\Component\Routing\RouteCollection;
use function array_unique;
use function class_exists;
use function explode;
use function http_build_query;
use function is_string;
use function preg_replace_callback;
use function strlen;
use function substr;

/**
 * Symfony-Based Router Abstraction
 */
#[Service]
class Routing implements BuildStep
{
    private const array PATTERNS = [
        'positive-int' => '\d+',
        'integer' => '\d+',
        'int' => '\d+',
        'string' => '[a-zA-Z0-9-_]+',
        'release_string' => '\d+\.\d+\.\d+',
        'release_string_uscore' => '\d+\_\d+\_\d+',
        'version_string' => '\d+\.\d+',
        'version_string_uscore' => '\d+\_\d+',
        'full' => '.*',
    ];

    private const string PATTERN_MATCH = '/(\{[a-zA-Z0-9_]+:[a-zA-Z0-9_-]+})/';

    /**
     * Returns an array of the resolved route information, otherwise throws
     *
     * @throws ResourceNotFoundException
     * @throws MethodNotAllowedException
     *
     * @return null|array{
     *    _controller: array{class-string, string}
     * }
     */
    public function match(Request $request): ?array
    {
        $requestContext = new RequestContext();
        $requestContext->fromRequest($request);

        $matcher = new CompiledUrlMatcher(
            require ProjectGlobals::getProjectRoot() . '/var/router.php',
            $requestContext,
        );

        /** @phpstan-ignore return.type  */
        return $matcher->matchRequest($request);
    }

    public static function build(BuildContext $context): void
    {
        $routes = new RouteCollection();

        foreach (BuildTools::getReflectionClasses() as $class) {
            $classAttr = ReflectionHelpers::getAttribute($class, RouteAttribute::class);
            if (!$classAttr) {
                continue;
            }

            foreach ($class->getMethods() as $method) {
                $methodAttr = ReflectionHelpers::getAttribute($method, RouteAttribute::class);
                if (!$methodAttr) {
                    continue;
                }

                /* titles get concatenated */
                $path = ($classAttr->path ?? '');
                if (is_string($methodAttr->path)) {
                    $path .= $methodAttr->path;
                }

                /* to make our lives easier, we can replace the substitution tokens in the paths with
                 * symfony requires */
                $replacements = $requirements = [];
                preg_match_all(self::PATTERN_MATCH, $path, $matches, PREG_SET_ORDER);
                foreach ($matches as $match) {
                    [$full, $inner] = $match;

                    [$name, $pattern] = self::parsePlaceholder($inner);
                    $requirements[$name] = $pattern;
                    $replacements[$full] = '{' . $name . '}';
                }

                $normalizedPath = str_replace(array_keys($replacements), $replacements, $path);
                $methods = array_values(array_unique($methodAttr->methods ?: $classAttr->methods ?: ['GET']));
                $methodString = implode('|', $methods);

                $context->logger->debug("Routing ($methodString) '$normalizedPath' to {$class->getName()}->{$method->getName()}");

                $routes->add(
                    $normalizedPath,
                    new Route(
                        path: $path,
                        defaults: [
                            '_controller' => [$class->getName(), $method->getName()],
                        ],
                        requirements: $requirements,
                        methods: $methods,
                    ),
                );
            }
        }

        $dumper = new CompiledUrlMatcherDumper($routes);
        $compiledCode = $dumper->dump(['class' => 'CompiledRouter']);

        if (FS::writeContentsIfChanged(ProjectGlobals::getProjectRoot() . '/var/router.php', $compiledCode)) {
            $context->logger->debug('Writing updated CompiledRouter');
        }
    }

    /**
     * Converts a controller + method into a URL
     *
     * Because we are using attribute-based routing, if we know the class, we can
     * reflect upon it to find its attribute and derive its path.
     *
     * This eliminates the need for hardcoding URLs
     *
     * @param (callable&array{class-string,string})|class-string $controller
     * @param array<string, mixed> $query
     * @param array<string, string|int|float|Stringable> $params
     */
    public static function resolve(array|string $controller, array $params = [], array $query = []): string
    {
        [$classId, $methodId] = is_string($controller) ? [$controller, '__invoke'] : $controller;

        static $cache = [];

        $cacheKey = $classId . '::' . $methodId;
        $fullPath = $cache[$cacheKey] ??= (function (string $classId, string $methodId): string {
            if (!class_exists($classId)) {
                throw new Error("Unknown or missing controller class '$classId'");
            }

            $class = new ReflectionClass($classId);
            $classAttr = ReflectionHelpers::getAttribute($class, RouteAttribute::class)
                ?? throw new Error("Class '$classId' does not have a `Route` attribute.");

            try {
                $method = $class->getMethod($methodId);
            } catch (ReflectionException) {
                throw new Error("Unknown or missing method '$classId->$methodId'");
            }

            $methodAttr = ReflectionHelpers::getAttribute($method, RouteAttribute::class)
                ?? throw new Error("Method '$classId::$methodId' does not have a `Route` attribute.");

            $path = is_string($classAttr->path) ? $classAttr->path : '';
            if (is_string($methodAttr->path)) {
                $path .= $methodAttr->path;
            }

            return $path;
        })(
            $classId,
            $methodId
        );

        $url = preg_replace_callback(
            pattern: Routing::PATTERN_MATCH,
            callback: function (array $match) use ($fullPath, $params): string {
                [$name] = Routing::parsePlaceholder($match[1]);

                $value = $params[$name]
                    ?? throw new Error("Missing required URL parameter '$name' for '$fullPath'");

                return (string)$value;
            },
            subject: $fullPath,
        );

        if (!is_string($url)) {
            throw new Error("Unable to parse URL structure for '$classId->$methodId'");
        }

        if ($query) {
            $url .= '?' . http_build_query($query);
        }

        return $url;
    }

    /**
     * @return array{string,string}
     */
    private static function parsePlaceholder(string $input): array
    {
        $withoutCurley = substr($input, 1, strlen($input) - 2);
        [$name, $type] = explode(':', $withoutCurley);

        $matchPattern = self::PATTERNS[$type]
            ?? throw new BuildStepFailureException("Unknown routing pattern '$type' for placeholder '$name'");

        return [$name, $matchPattern];
    }
}
