<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Biodata;
use App\Models\Faculty;
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
                <a href="' . route('back.maba.show', $row->user->uuid) . '" class="btn btn-info  btn-xs"><i class="fa fa-eye"></i></a>';
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
                <a href="' . route('back.maba.show', $row->user->uuid) . '" title="INFO DETAIL" class="btn btn-info  btn-xs"><i class="fa fa-eye"></i></a> 
                <a href="' . route('back.maba.edit', $row->uuid) . '" title="EDIT INFO MABA" class="btn btn-warning btn-xs"><i class="fa fa-pencil"></i></a>
                <a href="' . route('back.maba.berkas', $row->user->uuid) . '" title="TELUSURI BERKAS" class="delete btn btn-success btn-xs"><i class="fa fa-file"></i></a>
                <a  href="' . route('back.maba.reset', $row->user->uuid) . '" title="RESET PASSWORD" class="btn btn-danger reset btn-xs"><i class="fa fa-refresh "></i></a>';
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

    public function get_fakultas()
    {
        $faculties = Faculty::latest()->get();
        return response()->json($faculties);
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
