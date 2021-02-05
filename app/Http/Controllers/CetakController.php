<?php

namespace App\Http\Controllers;

use App\Exports\PmbExport;
use App\Models\Maba;
use App\Models\Token;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use PDF;
use Excel;
class CetakController extends Controller
{

    public function formulir($id)
    {
       
        $maba = Maba::with(['token', 'biodata', 'biodata.getfakultas', 'biodata.getprodi'])->find($id);
        $passphoto = 'media/berkas/' . $maba->biodata->passphoto;
        $pdf = PDF::loadView('cetak.formulir', compact('maba', 'passphoto'), [
            'title' => 'Another Title',
            'margin_top' => 0
        ]);

        return $pdf->stream('formulir.pdf');
    }

    public function pmb()
    {

        $data = Token::where('use_token', 1)->with(['maba.biodata', 'maba.biodata.getfakultas', 'maba.biodata.getprodi'])->latest();
        if (request('gelombang') !== 'all') {
            $data->where('gelombang', request('gelombang'))->orderBy('gelombang', 'DESC');
        }

        if (request('angkatan') !== 'all') {
            $data->where('angkatan', request('angkatan'))->orderBy('angkatan', 'DESC');
        }

        if (request('fakultas') !== 'all') {

            $data->whereHas('maba.biodata', function ($query) {
                return $query->where('fakultas', '=', request('fakultas'))->orderBy('fakultas', 'ASC');
            })->get();
        }
        if (request('prodi') !== 'all') {
            $data->whereHas('maba.biodata', function ($query) {
                return $query->where('prodi', '=', request('prodi'))->orderBy('prodi', 'ASC');
            })->get();
        }
        
        $results = $data->get();

        if(request('format') == 'pdf'){
            $pdf = PDF::loadView('cetak.pmb', compact('results'));
            return $pdf->download('pmb.pdf');
        }else{
            $nama_file = 'pmb'.date('Y-m-d_H-i-s').'.xlsx';
            return Excel::download(new PmbExport($results), $nama_file);
        }
      
    }
}
