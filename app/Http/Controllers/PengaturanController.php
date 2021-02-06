<?php
namespace App\Http\Controllers;
use App\Http\Middleware\Maba;
use App\Models\Faculty;
use App\Models\Pengaturan;
use App\Models\Study;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class PengaturanController extends Controller
{
    public function __construct()
    {
        $this->status   = Pengaturan::find(1)->pmb == 1 ? true : false;
        $this->pmb      = Pengaturan::find(1);
    }
    public function index()
    {
        if ($this->status === true) {
            return view('pmb.close');
        } else {
            return view('pmb.open');
        }
    }
    public function close(){
        $faker = null;
        foreach(request()->faker as $v){
            $randprodi =   $this->prodi = Study::with('faculty')->inRandomOrder()->first();
            $faker[] = [
                'nama' => $v,
                'fakultas' =>  $randprodi->faculty->id,
                'prodi' =>  $randprodi->id,
                'angkatan' =>   $this->pmb->angkatan,
                'gelombang' =>   $this->pmb->gelombang,
            ];
        }
       try {
            DB::table('maba')->where('arsip', '=', 0)->update(array('arsip' => 1));
            DB::table('faker')->insert($faker);
            $this->pmb->update(['pmb' => 0]);
            return redirect()->back();
       } catch (QueryException $th) {
           abort('404', 'Kesalahan');
       }
    }
    public function open()
    {
        $gelombang = request('gelombang');
        $year = date('Y');
        $checking = Pengaturan::get_gelombang($year, $gelombang);
        if($checking === false){
            $pesan = ['error', 'Gelombang Yang Anda Masukan Sudah Berakhir Di Tahun Ini Harap Inputkan Gelombang Baru'];
        }else{
            $this->pmb->update([
                'pmb' => 1, 
                'gelombang' => $gelombang, 
                'angkatan' => $year
                ]);
            $pesan = ['success', 'Berhasil Membuka Pendaftran Mahasiswa Baru'];
        }
        return redirect()->back()->with($pesan);
    }
}
