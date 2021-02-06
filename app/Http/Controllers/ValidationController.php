<?php
namespace App\Http\Controllers;
use App\Models\Faculty;
use App\Models\Token;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Laravolt\Indonesia\Models\Province as Province;
use stdClass;

class ValidationController extends Controller
{
    public function validation()
    {
        request()->validate([
            'email' => 'required|email',
            'token' => 'required|max:24',
        ]);
        $email = request('email');
        $token = request('token');
        $isToken = Token::where(['email' => $email, 'token' => $token])->first();
        if ($isToken) {
            if ($isToken->use_token == 0) {
               
                $signature = Crypt::encryptString($isToken->email.'`'.$isToken->token.'`'.$isToken->angkatan.'`'.$isToken->gelombang);  
                return redirect()->route('formulir')->withInput(['signature' =>  $signature]);
            
            } else {
                return redirect()->back()->with('error', 'Token Anda Sudah Terpakai, Silahkan Periksa Kembali Token Anda');
            }
        } else {
            return redirect()->back()->with('error', 'Silahkan Periksa Kembali Token Anda');
        }
    }
}
