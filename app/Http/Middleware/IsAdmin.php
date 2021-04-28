<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class IsAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if (Auth::user()->role == '3') {
            return $next($request);
        }

        return redirect()->route('home'); // If user is not an admin.
    }
}



// {
//     if (Auth::user()->role == '3') {
//         return $next($request);
//     }

//     return redirect()->route('some.route'); // If user is not an admin.
// }