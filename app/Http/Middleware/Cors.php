<?php

namespace App\Http\Middleware;

use Closure;

class Cors
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $headers = [
            'Access-Control-Allow-Origin' => '*',
            'Access-Control-Allow-Methods' => 'GET, POST, PUT, PATCH, DELETE, OPTIONS',
            'Access-Control-Allow-Headers' => 'Accept, Authorization, Content-Type, x-event-id',
        ];

        $response = $next($request);

        // Add headers to request
        foreach ($headers as $key => $value)
        {
            $response->headers->set($key, $value);
        }
        return $response;
    }
}