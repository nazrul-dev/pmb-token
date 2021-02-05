<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Biodata;
use App\Models\Maba;
use \DataTables as Dbs;
use Illuminate\Support\Facades\Crypt;

class MabaController extends Controller
{

    public function arsip()
    {
        $data   = Maba::with(['token', 'biodata', 'biodata.getfakultas', 'biodata.getprodi'])->where('arsip', 1)->latest()->get();
        return Dbs::of($data)
            ->addIndexColumn()
            ->addColumn('action', function ($row) {
                $actionBtn = '
                <a href="' . route('back.maba.show', Crypt::encryptString($row->user->id)) . '" class="btn btn-info  btn-xs"><i class="fa fa-eye"></i></a>';
                return $actionBtn;
            })
            ->addColumn('periode', function ($row) {
                $periode = 'AGK.'.$row->token->angkatan.'/GEL.'.$row->token->gelombang;
                return $periode;
            })
            ->rawColumns(['action', 'periode'])
            ->make(true);
    }

    public function pmb_watch_prodi(){

    }

    public function pmb_watch_fakultas(){
        
    }

    public function pmb_watch_all(){
        
    }


    public function scanformulir(Biodata $biodata)
    {
        
    }
}
