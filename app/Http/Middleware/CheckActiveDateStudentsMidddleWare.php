<?php

namespace App\Http\Middleware;

use Closure;
use Carbon\Carbon;


class CheckActiveDateStudentsMidddleWare
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
        
        if(auth()->check()){

            if(auth()->user()->hasRole("student")){
                if(auth()->user()->active_date && auth()->user()->active_date->lt(Carbon::now())){
                    $user = \App\User::find(auth()->user()->id);
                    $user->is_active = 0;
                    $user->active_date = null;
                    $user->save();
                    auth()->logout();
                    return redirect('/login');
                }
            }

            if(!auth()->user()->is_active ){
                auth()->logout();
                return redirect('/login');
            }
        }
    
        return $next($request);
    }
}
