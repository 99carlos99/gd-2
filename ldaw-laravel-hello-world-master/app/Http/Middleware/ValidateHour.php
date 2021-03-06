<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

use Illuminate\Support\Carbon;

class ValidateHour
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
        $date = Carbon::now('America/Mexico_City');
        $dateBlock = Carbon::parse('2030-10-05 23:00:00', 'America/Mexico_city');
        if ($date->gte($dateBlock)){
            //return abort(403);
            return redirect()->route('coins.create');
        }
        return $next($request);
    }
}
