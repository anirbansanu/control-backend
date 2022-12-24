<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Middlewares\RoleMiddleware;
use Spatie\Permission\Exceptions\UnauthorizedException;

class CustomRoleMiddleware extends RoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  Array  $role
     * @return mixed
     */
    
    // public function handle(Request $request, Closure $next, $role, $guard = null)
    public function handle($request, Closure $next, $role, $guard = null)
    {
        if (Auth::guard($guard)->guest()) {
            throw UnauthorizedException::notLoggedIn();
        }

        $roles = is_array($role)
            ? $role
            : explode('|', $role);

            // print_r($roles);
        $user = Auth::guard($guard)->user();
        // print_r($user);exit;
        // echo $user->isSubAdmin();exit;
        if (! $user->hasAnyRole($roles)) {
            if($request->wantsJson())
            {
                throw UnauthorizedException::forRoles($roles);
            }
            else
            {
                if($user->isAdmin())
                {
                    return redirect('admin/dashboard');
                }

                if($user->isSubadmin())
                {
                    return redirect('subadmin/dashboard');
                }

                if($user->isUser())
                {
                    return redirect('user/home');
                }

                Auth::logout();
                return redirect('/login');
            }
        }

        return $next($request);
    }
}
