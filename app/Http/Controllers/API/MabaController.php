<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Biodata;
use App\Models\Maba;
use App\Models\Study;
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
                $periode = 'AGK.' . $row->token->angkatan . '/GEL.' . $row->token->gelombang;
                return $periode;
            })
            ->rawColumns(['action', 'periode'])
            ->make(true);
    }

    public function get_current_maba()
    {
        $data   = Maba::with(['token', 'biodata', 'biodata.getfakultas', 'biodata.getprodi'])->where('arsip', 0)->latest()->get();
        return Dbs::of($data)
            ->addIndexColumn()
            ->addColumn('action', function ($row) {
                $actionBtn = '
                        <a href="' . route('back.maba.show', Crypt::encryptString($row->user->id)) . '" class="btn btn-info  btn-xs"><i class="fa fa-eye"></i></a> 
                        <a href="' . route('back.maba.edit', Crypt::encryptString($row->id)) . '" class="btn btn-warning btn-xs"><i class="fa fa-pencil"></i></a>
                        <a href="' . route('back.maba.berkas', Crypt::encryptString($row->user->id)) . '" class="delete btn btn-success btn-xs"><i class="fa fa-file"></i></a>';
                return $actionBtn;
            })
            ->rawColumns(['action'])
            ->make(true);
    }

    public function get_prodi($id)
    {
        $studies = Study::where('faculty_id', $id)->get();
        return response()->json($studies);
        
    }

    public function pmb_watch_prodi()
    {
    }

    public function pmb_watch_fakultas()
    {
    }

    public function pmb_watch_all()
    {
    }


    public function scanformulir(Biodata $biodata)
    {
    }
}
