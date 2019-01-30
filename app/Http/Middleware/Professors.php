<?php

namespace App\Http\Middleware;

use Closure;
use App\Professor;
use Illuminate\Support\Facades\Auth;

class Professors
{
    public function handle($request, Closure $next, $guard = null)
    {
        if (!Auth::professors()) {
            return redirect()->back();
        }

        return $next($request);
    }
}
