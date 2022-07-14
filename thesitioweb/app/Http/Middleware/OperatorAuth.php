<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class OperatorAuth
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        if(auth()->check())
        {
            if(auth()->user()->role == 'operator')
            {
                return $next($request);
            }
            //Tenes que crear redirecciones dependiendo el tipo de user que es esto aplicarlo para admin y user, y asi dejar el public/ de un lado
        }
        return redirect()->to('/');
    }
}
