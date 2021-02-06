<?php

use App\Http\Controllers\ArchiveController;
use App\Http\Controllers\CetakController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\FacultyController;
use App\Http\Controllers\MabaController;
use App\Http\Controllers\PengaturanController;

use App\Http\Controllers\StudyController;
use App\Http\Controllers\TokenController;
use App\Http\Controllers\ValidationController;
use App\Models\Pengumuman;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Auth::routes();
Route::get('/', function () {
    return view('home');
});

Route::get('/validation', function () {
    return view('validation');
});

Route::get('/validation', function () {
    return view('validation');
});

Route::get('after/store/{email}', function ($email) {
    return view('afterpendaftaran', compact('email'));
})->name('after.store');


Route::post('maba/store', [MabaController::class, 'store'])->name('maba.store');

Route::post('validation', [ValidationController::class, 'validation'])->name('validation');
 //this
Route::middleware('TokenValid')->get('maba/formulir', [MabaController::class, 'formulir'])->name('formulir');


Route::middleware('auth')->name('back.')->prefix('back')->group(function () {
    
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
    // MABA ROUTE 
    Route::middleware('Akses:maba,panitia')->name('maba.')->prefix('maba')->group(function () {
        Route::get('berkas/{id}', [MabaController::class, 'berkas'])->name('berkas');
        Route::patch('berkas/upload', [MabaController::class, 'berkasUpload'])->name('uploadberkas');
        Route::get('cetak/formulir/{id}', [CetakController::class, 'formulir'])->name('cetak.formulir');
    });
    Route::resource('maba', MabaController::class, ['except' => ['store', 'create']]);
    // MABA ROUTE 
    // ADMIN TOKEN ROUTE 
    Route::middleware('Akses:admin,superadmin')->resource('token', TokenController::class);
    // ADMIN TOKEN ROUTE 
    Route::middleware(['Akses:panitia,superadmin'])->group(function () {
        Route::resources([
            'faculty'       => FacultyController::class,
            'study'         => StudyController::class
        ]);
        Route::name('pmb.')->prefix('pmb')->group(function () {
            Route::resource('pengumuman', Pengumuman::class);
            Route::get('pengaturan', [PengaturanController::class, 'index'])->name('pengaturan');
            Route::get('arsip', [ArchiveController::class, 'index'])->name('arsip');
            Route::post('cetak', [CetakController::class, 'pmb'])->name('cetak');
        });
    });
    Route::middleware('Akses:superadmin')->name('pmb.')->prefix('pmb')->group(function () {
        Route::get('studi/kouta', [StudyController::class, 'setKouta'])->name('studi.kouta');
        Route::patch('studi/kouta/{study}', [StudyController::class, 'setKouta'])->name('studi.kouta.update');
        Route::post('close', [PengaturanController::class, 'close'])->name('close');
        Route::post('open', [PengaturanController::class, 'open'])->name('open');
    });
});
