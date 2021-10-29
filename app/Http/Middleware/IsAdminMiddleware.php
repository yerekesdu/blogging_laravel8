<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\Role;
use App\Models\User;

class IsAdminMiddleware
{

    public function handle(Request $request, Closure $next)
    {
        if(auth()->user()->role_id !=Role::ADMIN)
            abort(483);

        return $next($request);
    }
}
