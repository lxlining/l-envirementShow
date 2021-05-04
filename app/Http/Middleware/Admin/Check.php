<?php

namespace App\Http\Middleware\Admin;

use Closure;

class Check
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
        if(session()->get('uid')==null){
            return redirect('/admin/login');
        }
        return $next($request);
    }
}
