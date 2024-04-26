<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class CheckPermissions
{
    public function handle(Request $request, Closure $next)
    {
        $permissions = Cache::get('permissions_' . session('roleName'));

        // Assuming you have a route parameter named 'permission' which specifies required permission
        $requiredPermission = $request->route()->parameter('permission');
        dd($permissions);

        if ($permissions) {
            foreach ($permissions as $permission) {
                if ($permission['Name'] === $requiredPermission && $permission['ViewRight'] === 1) {
                    return $next($request); // User has the required permission, allow access
                }
            }
        }

        // If the user doesn't have the required permission, you can return a response indicating access denied
        return response()->json(['error' => 'Access Denied'], 403);
    }
}