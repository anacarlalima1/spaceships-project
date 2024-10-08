<?php

namespace App\Shared\Infrastructure\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Http\JsonResponse;
class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string|null
     */
    protected function redirectTo($request)
    {
        if (preg_match('/api/', $request->path())) {
            return route('nonauthorizaded');
        }

        return route('login');
    }
}
