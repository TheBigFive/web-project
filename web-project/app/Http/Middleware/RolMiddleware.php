<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
use App\Gebruikers;

class RolMiddleware
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
        //Er worden ook extra parameters aan de functie meegegeven, maar het is onbekend hoeveel, dus zal func_get_args() alle parameters opvragen en de array_slice negeert de eerste 2 parameters
        $rollen = array_slice(func_get_args(), 2);
        if(Auth::check()){
            $gebruiker = new Gebruikers;
            $gebruikerId = Auth::user()->id;
            
            foreach ($rollen as $rol) {
                if($gebruiker->geefRol($gebruikerId) == $rol)
                {
                    return $next($request);
                }
            }
            return redirect('/');
            
        }else{
             return redirect('/');
        }

        
    }
}

