<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Role
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next, $admin, $teacher, $user)
    {
        $array = [$admin, $teacher, $user];
        $roles = (Auth::check() ? $array : []);
        if (Auth::user()->role_as == 0 && in_array('admin', $roles)) {
            return $next($request);
        }
        if (Auth::user()->role_as == 1 && in_array('teacher', $roles)) {
            return $next($request);
        }
        if (Auth::user()->role_as == 2 && in_array('user', $roles)) {
            return $next($request);
        }
        Auth::logout();
        return redirect('/login')->with('status', 'You are not Authorized');
    }
}
