<?php

namespace phpweb\Framework\Services;

use CompiledServiceContainer;
use Error;
use phpweb\Framework\Build\BuildContext;
use phpweb\Framework\Build\BuildStep;
use phpweb\Framework\Build\BuildStepFailureException;
use phpweb\Framework\Build\BuildTools;
use phpweb\Framework\Build\ReflectionHelpers;
use phpweb\Framework\IO\FS;
use phpweb\Framework\Routing\Route;
use phpweb\ProjectGlobals;
use Psr\Container\ContainerInterface;
use ReflectionClass;
use ReflectionException;
use Symfony\Component\DependencyInjection\Container;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Definition;
use Symfony\Component\DependencyInjection\Dumper\PhpDumper;
use Symfony\Component\DependencyInjection\Reference;
use function is_file;

class ServiceLocator implements BuildStep
{
    public static function build(BuildContext $context): void
    {
        ini_set('memory_limit', '1G');

        // 1. Initialize the Standalone Container Builder
        $builder = new ContainerBuilder();

        foreach (BuildTools::parseClassHierarchy(ProjectGlobals::getProjectRoot() . '/src') as $classId => $class) {
            $attr = ReflectionHelpers::getAttribute($class, Service::class);

            /* routes are required to be services, and public */
            $route = ReflectionHelpers::getAttribute($class, Route::class);
            if (!$attr && !$route) {
                continue;
            }

            $definition = new Definition($classId);
            $definition->setAutowired(true);

            /* anything which exposes a route may need to be autoloaded */
            if ($attr?->public || $route) {
                $definition->setPublic(true);
            }

            if ($attr && $attr->factory) {
                [$factoryClassId, $factoryMethod] = $attr->factory;

                try {
                    $factoryClassReflection = new ReflectionClass($factoryClassId);
                }
                /** @phpstan-ignore-next-line - It doesn't know ReflectionClass constructor can throw */
                catch (ReflectionException) {
                    throw new BuildStepFailureException(
                        message: "#[Service] specifies factory class '$factoryClassId' that does not exist",
                        target: $class,
                    );
                }

                try {
                    $factoryMethodReflection = $factoryClassReflection->getMethod($factoryMethod);
                } catch (ReflectionException) {
                    throw new BuildStepFailureException(
                        message: "#[Service] specifies factory class method {$factoryClassId}::{$factoryMethod} that does not exist'",
                        target: $class,
                    );
                }

                if (!$factoryMethodReflection->isPublic()) {
                    throw new BuildStepFailureException(
                        message: "#[Service] specifies factory class method {$factoryClassId}::{$factoryMethod} that is not public'",
                        target: $class,
                    );
                }

                /* non-static methods must be on a class that is by itself a service */
                if (!$factoryMethodReflection->isStatic()) {
                    $targetFactoryClass = new ReflectionClass($factoryClassId);
                    if (!ReflectionHelpers::getAttribute($targetFactoryClass, Service::class)) {
                        throw new BuildStepFailureException(
                            message: "#[Service] specifies factory class '$factoryClassId' that is not registered a service",
                            target: $class,
                        );
                    }

                    /* by using a reference we call upon the service */
                    $factoryClassId = new Reference($factoryClassId);
                }

                $definition->setFactory([$factoryClassId, $factoryMethod]);
            }

            $context->logger->debug("Registered {$class->getName()} as a service");
            $builder->setDefinition($classId, $definition);
        }

        /* this is required to give access to the service container without separate aliasing attributes */
        $builder->setAlias(ContainerInterface::class, 'service_container');

        $builder->compile();

        $dumper = new PhpDumper($builder);
        $containerSource = $dumper->dump([
            'class' => 'CompiledServiceContainer',
            'base_class' => 'Symfony\Component\DependencyInjection\Container',
        ]);

        assert(is_string($containerSource));

        FS::writeContentsIfChanged(ProjectGlobals::getProjectRoot() . '/var/container.php', $containerSource);
    }

    public static function make(): Container
    {
        /* loads the compiled container */
        $containerPath = ProjectGlobals::getProjectRoot() . '/var/container.php';
        if (!is_file($containerPath)) {
            throw new Error('Container has not been built');
        }

        require_once $containerPath;

        /** @phpstan-ignore-next-line  */
        return new CompiledServiceContainer();
    }
}
