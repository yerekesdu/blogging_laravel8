<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class ChangeLocaleMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        if($request->has('changelocale')){
            $loc = $request->input('changelocale');
            app()->setLocale($loc);
        }

        return $next($request);
    }
}
