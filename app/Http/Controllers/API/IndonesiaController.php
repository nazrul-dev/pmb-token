<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class IndonesiaController extends Controller
{
    public function provinsi($id){
        $state = \Indonesia::findProvince($id, ['provinces']);
        return response()->json($state);
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
