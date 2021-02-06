<?php

namespace App\Http\Middleware;
use Illuminate\Contracts\Encryption\DecryptException;

use App\Models\Token;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

class TokenValid
{

    public $attributes;

    public function handle(Request $request, Closure $next)
    {
    
        try {
            $token = explode("`", Crypt::decryptString($request->old('signature')));
            $response = Token::where([
                'email' => $token[0],
                'token' => $token[1],
                'angkatan' => $token[2],
                'gelombang' => $token[3],
            ])->first()->toArray();
            $request->request->add(['signature' => $request->old('signature'), $response]);
            return $next($request);
        } catch (DecryptException $e) {
            return redirect()->back()->with('error', 'Sesi Anda Berakhir Silahkan Coba Lagi');
        }
        
    }

}
