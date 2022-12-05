<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next, $id)
    {
        // if (Auth::check()) {
        //     return redirect('/home')->with('status', '$role');
        // }
        // echo $id;
        // $role = Auth::check($id);
        // $role = $id;
        // $role = (Auth::check() ? 'hello' : 'world');
        // // die();
        // if (Auth::user()->role_as == '0' && $role == 'admin')
        //     return $next($request);
        // if (Auth::user()->role_as == '1' && $role == 'teacher')
        //     return $next($request);
        // if (Auth::user()->role_as == '2' && $role == 'user')
        //     return $next($request);
        // return redirect('/home')->with('status', $role);

        // if (Auth::user()->role_as == '0') {
        //     // die('Not');
        //     // echo 'Welce';
        //     return redirect('/home')->with('status', 'A Denied');
        // }
        // return $next($request);
    }
}
