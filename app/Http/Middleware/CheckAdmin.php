<?php

namespace App\Http\Middleware;

use App\Models\RoleType;
use Closure;
use Auth;

class CheckAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {   $role_type = RoleType::where('name', 'admin')->first();
        if (Auth::check()) {
            if (Auth::user()->role_type_id === $role_type->id) {
                return $next($request);
            }
        }
        return redirect('/');
    }
}
