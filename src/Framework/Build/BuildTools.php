<?php

namespace phpweb\Framework\Build;

use FilesystemIterator;
use Monolog\Formatter\LineFormatter;
use Monolog\Handler\StreamHandler;
use Monolog\Level;
use Monolog\Logger;
use phpweb\Framework\IO\FS;
use phpweb\ProjectGlobals;
use Psr\Log\LoggerInterface;
use RecursiveDirectoryIterator;
use RecursiveIteratorIterator;
use ReflectionClass;
use ReflectionFunction;
use ReflectionMethod;
use SplFileInfo;
use Throwable;
use function count;
use function fwrite;
use function ini_set;
use function is_array;
use function sprintf;
use function time;
use function token_get_all;
use function trim;
use const STDERR;
use const T_CLASS;
use const T_DOUBLE_COLON;
use const T_INTERFACE;
use const T_NAMESPACE;
use const T_STRING;
use const T_TRAIT;

class BuildTools
{
    private const VCACHE_KEY = 'last-modified';

    /**
     * Used for protecting developers from hurting themselves by relying on data which
     * might have stale caches or otherwise be unready for use during build steps
     */
    private static bool $building = false;

    public static function isBuilding(): bool
    {
        return self::$building;
    }

    /**
     * @return array<string, ReflectionClass<object>>
     */
    public static function getReflectionClasses(): array
    {
        static $cache = null;
        return $cache ??= self::parseClassHierarchy(ProjectGlobals::getProjectRoot() . '/src');
    }

    /**
     * Performs the full parsing and build stage
     */
    public static function executeBuild(?LoggerInterface $logger = null): int
    {
        ini_set('memory_limit', '1G');

        /** @var list<class-string<BuildStep>> $buildSteps */
        $buildSteps = [];
        foreach (BuildTools::parseClassHierarchy(ProjectGlobals::getProjectRoot() . '/src') as $class) {
            if (!$class->isSubclassOf(BuildStep::class)) {
                continue;
            }

            $buildSteps[] = $class->getName();
        }

        /* protect us against doing silly things */
        self::$building = true;

        if (!$logger) {
            $logger = new Logger('build');
            $logger->pushHandler(
                new StreamHandler('php://stdout', Level::Debug)
                    ->setFormatter(new LineFormatter("%level_name%: %message% %context% %extra%\n")),
            );
        }

        $context = new BuildContext($logger);
        foreach ($buildSteps as $classId) {
            $logger->info("Building step $classId");

            try {
                $classId::build($context);

                /* this allows our cache to kick in */
                BuildTools::updateLastModifiedTime(time());
            } catch (BuildStepFailureException $e) {
                $logger->critical("Build step '$classId' failed with an exception! " . $e->getMessage());

                fwrite(STDERR,  "--------------------------\n");
                fwrite(STDERR, "Step:    $classId\n");
                fwrite(STDERR, "Error:   {$e->getMessage()}\n");

                $target = $e->target;
                if ($target instanceof ReflectionMethod) {
                    fwrite(
                        STDERR,
                        sprintf("Target:  %s%s%s\n",
                            $target->getDeclaringClass()->getName(),
                            ($target->isStatic() ? '::' : '->'),
                            $target->getName(),
                        ),
                    );
                } elseif ($target instanceof ReflectionClass) {
                    fwrite(STDERR, "Target:  {$target->getName()}\n");
                } elseif ($target instanceof ReflectionFunction) {
                    fwrite(STDERR, "Target:  {$target->getName()}\n");
                }

                exit(1);
            } catch (Throwable $e) {
                fwrite(STDERR, 'Unhandled exception building ' . $classId . ': ' . $e->getMessage() . "\n");
                fwrite(STDERR, $e->getTraceAsString() . "\n");
                exit(1);
            }
        }

        return 0;
    }

    /**
     * @return array<string, ReflectionClass<object>>
     * @throws \ReflectionException
     */
    public static function parseClassHierarchy(string $baseDir): array
    {
        $filesIterator = new RecursiveIteratorIterator(
            new RecursiveDirectoryIterator($baseDir, FilesystemIterator::SKIP_DOTS),
            RecursiveIteratorIterator::LEAVES_ONLY,
        );

        $foundFiles = [];

        /** @var SplFileInfo $file */
        foreach ($filesIterator as $file) {
            if ($file->getExtension() !== 'php') {
                continue;
            }

            $contents = FS::readContents($file->getRealPath());
            $className = self::extractClassName($contents);
            if ($className) {
                $foundFiles[$className] = new ReflectionClass($className);
            }
        }

        return $foundFiles;
    }

    public static function getLastModifiedTime(): int
    {
        /* in development mode we always assume that we've recently refreshed our data */
        if (ProjectGlobals::isDevelopmentMode()) {
            return time();
        }

        return VarCache::ReadVarWithDefault(self::VCACHE_KEY, time());
    }

    public static function updateLastModifiedTime(?int $time): int
    {
        $time ??= time();
        VarCache::WriteVar(self::VCACHE_KEY, $time);

        return $time;
    }

    /**
     * LLM generated a mechanism to extract class name from source contents
     *
     * @return class-string|null
     */
    private static function extractClassName(string $contents): ?string
    {
        $tokens = token_get_all($contents);

        $namespace = '';
        $class = '';

        $count = count($tokens);
        for ($i = 0; $i < $count; $i++) {
            // Look for the namespace
            if ($tokens[$i][0] === T_NAMESPACE) {
                for ($j = $i + 1; $j < $count; $j++) {
                    if ($tokens[$j] === ';') {
                        $i = $j; // Move main loop pointer forward
                        break;
                    }
                    if (is_array($tokens[$j])) {
                        $namespace .= $tokens[$j][1];
                    }
                }
                $namespace = trim($namespace);
            }

            // Look for the class, interface, or trait keyword
            if ($tokens[$i][0] === T_CLASS || $tokens[$i][0] === T_INTERFACE || $tokens[$i][0] === T_TRAIT || $tokens[$i][0] === T_ENUM) {
                // Verify this isn't a modern PHP "::class" resolution or anonymous class
                if (isset($tokens[$i - 1]) && is_array($tokens[$i - 1]) && $tokens[$i - 1][0] === T_DOUBLE_COLON) {
                    continue;
                }

                // Find the next string token, which will be the class name
                for ($j = $i + 1; $j < $count; $j++) {
                    if ($tokens[$j][0] === T_STRING) {
                        $class = $tokens[$j][1];
                        break 2; // Class found, exit both loops
                    }
                }
            }
        }

        if (empty($class)) {
            return null;
        }

        /** @var class-string $fqcn */
        $fqcn = $namespace ? $namespace . '\\' . $class : $class;

        return $fqcn;
    }
}
