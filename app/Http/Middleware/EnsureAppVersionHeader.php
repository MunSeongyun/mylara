<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class EnsureAppVersionHeader
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (!$request->headers->has('X-App-Version')) {
            return response()->json(['message' => 'X-App-Version header is required'], 400);
        }

        $response = $next($request);

        $response->header('X-App-Version', config('Middleware'));

        return $response;
    }
}
