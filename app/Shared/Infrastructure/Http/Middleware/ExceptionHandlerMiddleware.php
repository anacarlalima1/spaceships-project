<?php

namespace App\Shared\Infrastructure\Http\Middleware;

use Exception;
use Closure;

class ExceptionHandlerMiddleware
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
        try {
            return $next($request);
        } catch (Exception $exception) {
            return response()->json(['success' => false, 'exception' => $exception->getMessage()], 400);
        }
    }
}
