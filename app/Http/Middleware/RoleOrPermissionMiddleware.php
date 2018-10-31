<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Exceptions\UnauthorizedException;
use Spatie\Permission\Exceptions\PermissionDoesNotExist;

class RoleOrPermissionMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $roleOrPermission)
    {
        if(Auth::guest()){
            throw UnautherizedException::notLoggedIn();
        }

        $roleOrPermission = is_array($roleOrPermission)
        ? $roleOrPermission : explode('|', $roleOrPermission);

        try{
            if(! Auth::user()->hasAnyRole($roleOrPermissions)|| ! Auth::user()->hasAnyPermission($roleOrPermissions)){
                throw UnauthorizedException::forRolesOrPermissions($roleOrPermissions);
            }
        }
        catch(PermissionDoesNotExist $exception){

        }
        
        return $next($request);
    }
}
