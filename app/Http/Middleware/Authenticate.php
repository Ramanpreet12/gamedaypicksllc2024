<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class Authenticate
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string|null
     */
    public function handle($request, Closure $next)
    {
        // if (!is_null(request()->user())) {
        //     if (Auth::user()->role_as == 0) {
        //         //  return redirect('/admin/dashboard');
        //         return $next($request);
        //     } else if (Auth::user()->role_as == 1){
        //         return redirect('/dashboard');
        //     }


        // } else {
        //     return redirect('admin/login');
        // }

        if (!is_null(request()->user())) {
                return $next($request);
        } else {
            return redirect('login');
        }


    }
}
