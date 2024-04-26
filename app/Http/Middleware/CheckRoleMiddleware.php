<?php
namespace App\Http\Middleware;
use Closure;
class CheckRoleMiddleware
{
    public function handle($request, Closure $next)
    {
        $roleName = session('roleName');

        if ($roleName === 1) { return $next($request); }
        if ($roleName === 2) { return $next($request); }
        if ($roleName === 3) { return $next($request); }
        if ($roleName === 4) { return $next($request); }
        if ($roleName === 5) { return $next($request); }
        if ($roleName === 6) { return $next($request); }
        if ($roleName === 7) { return $next($request); }
        if ($roleName === 8) { return $next($request); }
        if ($roleName === 9) { return $next($request); }
        if ($roleName === 11) { return $next($request); }
        return redirect('/')->with('error', 'Unauthorized access');
    }
}
