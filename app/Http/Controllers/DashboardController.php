<?php
namespace App\Http\Controllers;
use App\Models\Maba;
use App\Models\Pengumuman;
use App\Models\Study;
use App\Models\Token;
class DashboardController extends Controller
{
    public function index()
    {
        $pengumuman         = Pengumuman::latest()->limit(3)->get();
        $prodi              = Study::get()->count();
        $maba               = Maba::where('arsip', 0)->get()->count();
        $status             = $this->pengaturan()['status'];
        $tokenall           = Token::where(['angkatan' =>  $this->pengaturan()['data']->angkatan, 'gelombang' =>  $this->pengaturan()['data']->gelombang])->count();
        $tokenused          = Token::where(['angkatan' =>  $this->pengaturan()['data']->angkatan, 'gelombang' =>  $this->pengaturan()['data']->gelombang, 'use_token' => 1])->count();
        return view('dashboard', compact(['pengumuman', 'maba', 'prodi', 'tokenall', 'tokenused', 'status']));
    }
}
