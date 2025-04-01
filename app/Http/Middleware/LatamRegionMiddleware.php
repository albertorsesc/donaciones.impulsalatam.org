<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Services\GeolocationService;

class LatamRegionMiddleware
{
    /**
     * @var GeolocationService
     */
    protected $geolocation;

    /**
     * Create a new middleware instance.
     *
     * @param GeolocationService $geolocation
     * @return void
     */
    public function __construct(GeolocationService $geolocation)
    {
        $this->geolocation = $geolocation;
    }

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        // Skip in local or testing environment
        if (app()->environment(['local', 'testing'])) {
            return $next($request);
        }

        // Allow certain routes to bypass this middleware (e.g., API routes)
        if ($this->shouldBypass($request)) {
            return $next($request);
        }

        // Check if the visitor is from LATAM
        if (!$this->geolocation->isFromLatam()) {
            // Return a 404 response for non-LATAM visitors
            abort(404);
        }

        return $next($request);
    }

    /**
     * Determine if the request should bypass LATAM restriction
     *
     * @param  \Illuminate\Http\Request  $request
     * @return bool
     */
    protected function shouldBypass(Request $request)
    {
        // Add any routes or patterns that should bypass this middleware
        $bypassPatterns = [
            '/api/*',  // API routes
            '/webhook/*', // Webhooks
            // Add more patterns as needed
        ];

        foreach ($bypassPatterns as $pattern) {
            if ($request->is($pattern)) {
                return true;
            }
        }

        return false;
    }
}