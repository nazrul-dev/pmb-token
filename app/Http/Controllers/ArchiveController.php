<?php

namespace App\Http\Controllers;


use App\Models\{Biodata, Faculty, Maba, Token, User};

class ArchiveController extends Controller
{

    public function index()
    {
        return view('arsip.index');
    }

    public function show($id)
    {

    }


}
