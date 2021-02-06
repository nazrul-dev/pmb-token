<?php
namespace App\Http\Controllers\API;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Laravolt\Indonesia\Models\Province;

class IndonesiaController extends Controller
{
    public function provinsi(){
        $provinces = Province::pluck('name', 'id');
        return response()->json($provinces);
        
    }
    public function city($id){
        $state = \Indonesia::findProvince($id, ['cities']);
        return response()->json($state);
    }
    public function district($id){
        $state = \Indonesia::findCity($id, ['districts']);
        return response()->json($state);
    }
}
