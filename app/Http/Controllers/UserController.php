<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;


class UserController extends Controller
{
   
    public function index()
    {
        $users = User::where('akses', '!=', 'maba')->where('akses', '!=', 'superadmin')->latest()->get();
        return view('users.index', compact('users'));
    }


    public function store(Request $request)
    {
        $request->validate([
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
       

        $user = new User;
        $user->email = $request->email;
        $user->akses = $request->akses;
        $user->password = Hash::make($request->password);
        $user->save();

        return redirect()->back()->with('success', 'Data Berhasil Di Tambahkan');

    }

  
    public function update(Request $request, User $user)
    {
    
      
        if (request('tipe') === 'akses'){
            $user->akses = $request->akses;
        }else{
            $user->password = Hash::make($request->password);
        }
        
        $user->save();

        return redirect()->back()->with('success', 'Data Berhasil Di Perbaharui');

      
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
