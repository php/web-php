<?php

namespace phpweb\Controllers;

use phpweb\Framework\Routing\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

#[Route(path: '')]
class TestingController
{
    #[Route(path: '/testing/', methods: ['GET'])]
    public function handleIndex(Request $request): Response
    {
        return new Response('Example routing test successful');
    }

    #[Route(path: '/testing/{valueId:string}/placeholder', methods: ['GET'])]
    public function handleRouteWithPlaceholder(Request $request): Response
    {
        $value = $request->attributes->get('valueId');

        return new Response(
            content: 'Received value: ' . $value,
            headers: ['Content-Type' => 'text/plain'],
        );
    }
}
