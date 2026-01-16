<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class AccessControll
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
        $current_date = date_create();
        $limit_date = date_create('2026-01-18 00:00:00');
        if(date_diff($current_date, $limit_date)->days <= 0){
            abort(403, 'Acceso denegado');
        }
        

        return $next($request);
    }
}
