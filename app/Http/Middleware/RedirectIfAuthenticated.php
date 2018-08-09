<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
        // if (Auth::guard($guard)->check()) {
        //     return redirect('/home');
        // }

        switch ($guard) {
            case 'admin':
                if (Auth::guard('admin')->check()):
                    return redirect()->route('admin.index');
                endif;
                break;
            case 'user':
                if (Auth::guard('user')->check()):
                    return redirect()->route('user.index');
                endif;
                break;
            default:
                if (Auth::guard($guard)->check()):
                    return redirect()->route('user.index');
                endif;
                break;
        }

        return $next($request);
    }
}
