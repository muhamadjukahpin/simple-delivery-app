<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class IsOperator
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
        if ($request->user()->level == 'admin' || $request->user()->level == 'operator') {
            return $next($request);
        }
        return redirect('/');
    }
}
