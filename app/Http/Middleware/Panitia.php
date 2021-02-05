<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Panitia
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
        if (Auth::check() && Auth::user()->akses == 'panitia' || Auth::user()->akses == 'superadmin' ) {
            return $next($request);
          }
         return redirect()->back()->with('error', 'Anda Tidak Memiliki Akses');
    }
}
