<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

class Usuario
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
        $user = Auth::user();
        $rol = $user->rol;
        
        
        if (Auth::check() && $rol=='usuario') {
            return abort(403);
            //return redirect('welcome');
        }
        
        return $next($request);
    }
}
