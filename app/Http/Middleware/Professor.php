<?php

namespace App\Http\Middleware;

use Closure;
use App\User;
use Illuminate\Support\Facades\Auth;

class Professor
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure$next, $guard = null)
    {
        if (!Auth::user()->isProfessor()) {
            return redirect()->back();
        }

        return $next($request);
    }
}
