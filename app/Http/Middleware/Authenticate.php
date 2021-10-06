<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;
// use Illuminate\Support\Facades\Auth;

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
        if (! $request->expectsJson()) {
            return route('login');
        }

        // if (Auth::check() && Auth::user()->role_id == 1) {
        //     return redirect()->route('admin.dashboard');
        // }else if(Auth::check() && Auth::user()->role_id == 3){
        //     return redirect()->route('user.dashboard');
        // }

    }
}
