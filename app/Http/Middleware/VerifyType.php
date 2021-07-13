<?php

namespace App\Http\Middleware;

use Closure;

class VerifyType
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
        if($request->session()->get('usertype') == 'Admin'){
            
            return $next($request);
        }
        else if($request->session()->get('usertype') == 'Writer'){
            return $next($request);
        }
        else if($request->session()->get('usertype') == 'Viewer'){
            return $next($request);
        }
        else{
            return redirect('/travelia');
        }
    }
}
