<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use App\Http\Middleware\LatamRegionMiddleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        $middleware->web(append: [
            // Add any web specific middleware here
        ]);

        $middleware->api(append: [
            // Add any API specific middleware here
        ]);

        // Register the LATAM region middleware as a global middleware
        $middleware->append(LatamRegionMiddleware::class);
    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();