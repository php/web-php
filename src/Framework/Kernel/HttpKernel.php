<?php

namespace phpweb\Framework\Kernel;

use phpweb\Framework\Routing\Routing;
use phpweb\Framework\Services\Service;
use Psr\Container\ContainerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\Routing\Exception\ExceptionInterface as RoutingExceptionInterface;
use function assert;

/**
 * Provides HTTP lifecycle management
 */
#[Service(public: true)]
readonly class HttpKernel
{
    public function __construct(
        private ContainerInterface $container,
        private Routing $routing,
    ) {
    }

    /**
     * This helper is called within the existing error handler.
     *
     * Rather than having to update the routing location in Apache, we use
     * the existing error handling fallback (error.php) to give us an entrypoint
     * for our service-based routing.
     *
     * If this function returns, it means no next-gen route was found, and it should
     * continue with the rest of the error.php not-found handler.
     */
    public function handleErrorInteropEntry(?Request $request = null): void
    {
        $request ??= Request::createFromGlobals();

        try {
            $response = $this->handleRequestWithoutErrorHandling($request);
        } catch (RoutingExceptionInterface) {
            /* error related to routing */
            return;
        } catch (NotFoundHttpException) {
            /* not found currently allows pass-through to the error handler */
            return;
        }

        /* send response back to user and exit so we don't continue on to rest of error.php */
        $response->prepare($request);
        $response->send();
        exit;
    }

    /**
     * Performs the main operation of taking in a request and creating a response but does not
     * handle any exceptions to allow these to propagate up to the testing framework.
     */
    public function handleRequestWithoutErrorHandling(Request $request): Response
    {
        $route = $this->routing->match($request);

        /* the route payload gets added as attributes, as these contain URL parameters */
        $request->attributes->add($route);

        /* the class id will already have been registered as a service during build */
        [$controllerClassId, $controllerMethodId] = $route['_controller'];

        /* Only service-based controllers are allowed via this handler */
        $controller = $this->container->get($controllerClassId);

        /* dispatch to service */
        $response = $controller->{$controllerMethodId}($request);
        assert($response instanceof Response);

        return $response;
    }
}
