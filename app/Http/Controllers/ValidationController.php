<?php

namespace App\Http\Controllers;

use App\Models\Faculty;
use App\Models\Token;
use Illuminate\Http\Request;
use Laravolt\Indonesia\Models\Province as Province;

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
                $provinces = Province::pluck('name', 'id');
                $faculties = Faculty::latest()->get();
                return view('formulir', compact(['faculties', 'isToken', 'provinces']));
            } else {
                return redirect()->back()->with('error', 'Token Anda Sudah Terpakai, Silahkan Periksa Kembali Token Anda');
            }
        } else {
            return redirect()->back()->with('error', 'Silahkan Periksa Kembali Token Anda');
        }
    }
}
