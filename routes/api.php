<?php

use App\Http\Controllers\API\MabaController;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::get('maba/arsip', [MabaController::class, 'arsip']);
Route::get('maba', [MabaController::class, 'get_current_maba']);
Route::get('prodi/{id}', [MabaController::class, 'prodi']);

//Route::get('provinsi/{id}', [IndonesiaController::class, 'provinsi']);
//Route::get('kabupaten/{id}', [IndonesiaController::class, 'city']);
//Route::get('kecamatan/{id}', [IndonesiaController::class, 'district']);

