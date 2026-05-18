<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

abstract class RoleMiddleware
{
    protected string $expectedRole;

    public function handle(Request $request, Closure $next): Response
    {
        if (auth()->check() && auth()->user()->role === $this->expectedRole) {
            return $next($request);
        }

        abort(403, "Akses ditolak. Anda bukan " . ucfirst($this->expectedRole) . ".");
    }
}

class AdminMiddleware extends RoleMiddleware
{
    protected string $expectedRole = 'admin';
}

class UserMiddleware extends RoleMiddleware
{
    protected string $expectedRole = 'user';
}