<?php

namespace App\Http\Middleware\Idenx;

use Closure;

class Login
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
        if(!session()->get('uid')){
            return redirect(url('/login'));
        }
        return $next($request);
    }
}
