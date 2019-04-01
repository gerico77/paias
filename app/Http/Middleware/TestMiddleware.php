<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
use App\Test;

class TestMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (Test::where('user_id', Auth::id())->where('exam_id', $request->input('exam_id'))->exists()) {
            return redirect()->back();
        }

        return $next($request);
    }
}