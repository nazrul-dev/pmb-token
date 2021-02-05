<?php

namespace App\Http\Controllers;

use App\Models\Token;
use Illuminate\Http\Request;
use App\Models\Pengaturan;
use Webpatser\Uuid\Uuid;

class TokenController extends Controller
{
   

    public function index()
    {
        if (request('tipe') == 'all') {
            $tokens = Token::latest()->get();
            $label = 'Semua Token';
        }

        if (request('tipe') == 'used') {
            $tokens = Token::where('use_token', 1)->latest()->get();
            $label = 'Token Yang Terpakai';
        }

        return view('token.index', compact(['tokens', 'label']));
    }


    public function create()
    {
        return view('token.create');
    }

  
    public function store(Request $request)
    {
        request()->validate([

            'email'     => 'required|unique:token,email',

        ]);
    
        $token = Token::create([
            'id'        => (string) Uuid::generate(4),
            'email'     => request('email'),
            'gelombang' => $this->pengaturan()['data']->gelombang,
            'angkatan'  =>  $this->pengaturan()['data']->angkatan,
            'token'     => Token::generate_token(),
            'password'  => Token::generate_password(),
        ]);

        dd($token);

        // $this->send_email_token($token);

        return redirect(route('back.token.show', $token['id']))->with('success', 'Berhasil Membuat Token Pendaftaran');
    }

   
    public function show(Token $token)
    {
        return view('token.show', compact('token'));
    }

 
    public function update(Request $request, Token $token)
    {
        //
    }


}
