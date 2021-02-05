<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;

class Akses
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next, ...$aksess)
    {
        if(in_array($request->user()->akses, $aksess, true)){
            return $next($request);
        }
       
       return redirect()->back();

        // if(Arr::has($aksess , $)){
        //     
        // }



    }
}
