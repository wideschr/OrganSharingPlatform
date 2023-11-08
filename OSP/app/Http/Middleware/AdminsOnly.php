<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AdminsOnly
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        
        if(!auth()->check()){
            abort(Response::HTTP_FORBIDDEN,'This page is only for admins.');
        }
        
        if(!auth()->user()->is_admin ==1){
            abort(Response::HTTP_FORBIDDEN,'This page is only for admins.');
        }

        return $next($request);
    }
}
