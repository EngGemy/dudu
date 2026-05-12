<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Session;

class InitializeMenuState
{
    public function handle($request, Closure $next)
    {
        //        if (!Session::has('isMenuOpen')) {
        //            Session::put('isMenuOpen', true);
        //        }

        return $next($request);
    }
}
