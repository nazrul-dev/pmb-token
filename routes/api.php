<?php
use App\Http\Controllers\API\IndonesiaController;
use App\Http\Controllers\API\MabaController;
use App\Models\Biodata;
use App\Models\Maba;
use App\Models\Study;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Route;

Route::get('found/{no}', function ($no) {
   $no = str_replace('-', '/', $no);
   $data = Biodata::with(['maba', 'maba.token', 'getfakultas', 'getprodi'])->where('no_registrasi', $no)->first();
   if($data){
       return response()->json($data);
   }

});

Route::get('maba', [MabaController::class, 'get_current_maba']);

Route::get('maba/archive', [MabaController::class, 'get_archive_maba']);

Route::get('prodi/{id}', [MabaController::class, 'get_prodi']);
Route::get('fakultas', [MabaController::class, 'get_fakultas']);

Route::get('scan/qr/{$signature}', [MabaController::class, '_scanQr']);

Route::get('provinsi', [IndonesiaController::class, 'provinsi']);
Route::get('kabupaten/{id}', [IndonesiaController::class, 'city']);
Route::get('kecamatan/{id}', [IndonesiaController::class, 'district']);


// chart
Route::get('biodata', [MabaController::class, 'test']);
 
           
