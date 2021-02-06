<?php
namespace App\Http\Middleware;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
class Akses
{
    public function handle(Request $request, Closure $next, ...$aksess)
    {
        if(in_array($request->user()->akses, $aksess, true)){
            return $next($request);
        }
       return redirect()->back();
        
    }
}
