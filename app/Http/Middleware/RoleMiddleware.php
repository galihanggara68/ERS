<?php

namespace App\Http\Middleware;

use Closure, Sentinel, Session;

class RoleMiddleware
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
        if(Sentinel::inRole('guru') && Sentinel::getUser()
        ->hasAccess([$request->route()->getName()])){
            return $next($request);
        }else if(Sentinel::inRole('admin')){
            return $next($request);
        }else{
            Session::flash('error', 'You don\'t have previege');
            return redirect('/');
        }
    }
}
