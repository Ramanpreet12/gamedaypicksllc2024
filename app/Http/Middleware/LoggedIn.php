<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
class LoggedIn
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string|null
     */
    public function handle($request, Closure $next)
    {


        if (!is_null(request()->user())) {
            return redirect('admin/dashboard');
        } else {
            return $next($request);
        }



        // if (!is_null(request()->user())) {
        //    // dd(Auth::user()->role_as);
        //     if (Auth::user()->role_as == 0) {
        //          return 'admin/dashboard';

        //     } else if (Auth::user()->role_as == 1){
        //         return "dashboard ";
        //     }
        // } else {
        //     return $next($request);
        // }


    }
}
