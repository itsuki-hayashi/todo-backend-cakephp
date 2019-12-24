<?php

namespace App\Middleware;

use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;
use Psr\Http\Server\MiddlewareInterface;

class CorsMiddleware implements MiddlewareInterface
{
    public function process(
        ServerRequestInterface $request,
        RequestHandlerInterface $handler
    ): ResponseInterface
    {
        // Calling $handler->handle() delegates control to the *next* middleware
        // In your application's queue.
        $response = $handler->handle($request);

        $response = $response->cors($request)
            ->allowOrigin(['*'])
            ->allowMethods(['GET', 'POST', 'PATCH', 'DELETE'])
            ->allowHeaders(['Content-Type'])
            ->build();

        return $response;
    }
}
