<?php

use App\Http\Controllers\ArchiveController;
use App\Http\Controllers\CetakController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\FacultyController;
use App\Http\Controllers\MabaController;
use App\Http\Controllers\PengaturanController;

use App\Http\Controllers\StudyController;
use App\Http\Controllers\TokenController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ValidationController;
use App\Models\Pengumuman;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Auth::routes();
Route::get('/', function () {
    return view('home');
});

Route::group( ['middleware' => 'guest' ], function()
{
    Route::get('/validation', function () {
        return view('validation');
    });
    
    Route::get('/validation', function () {
        return view('validation');
    });
    
    Route::get('after/store/{email}', function ($email) {
        return view('afterpendaftaran', compact('email'));
    })->name('after.store');
      
});


Route::post('maba/store', [MabaController::class, 'store'])->name('maba.store');

Route::post('validation', [ValidationController::class, 'validation'])->name('validation');
 //this
Route::middleware('TokenValid')->get('maba/formulir', [MabaController::class, 'formulir'])->name('formulir');


Route::middleware('auth')->name('back.')->prefix('back')->group(function () {
    
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
    // MABA ROUTE 
    Route::middleware('Akses:maba,panitia,superadmin')->name('maba.')->prefix('maba')->group(function () {
        Route::get('berkas/{id}', [MabaController::class, 'berkas'])->name('berkas');
        Route::patch('berkas/upload', [MabaController::class, 'berkasUpload'])->name('uploadberkas');
        Route::get('cetak/formulir/{id}', [CetakController::class, 'formulir'])->name('cetak.formulir');
        Route::middleware('Akses:panitia,superadmin')->group(function () {
            Route::get('password/reset/{user}', [MabaController::class, 'reset'])->name('reset');
        });
    });


    // MABA ROUTE 
    // ADMIN TOKEN ROUTE 
    Route::middleware('Akses:admin,superadmin')->resource('token', TokenController::class);
    // ADMIN TOKEN ROUTE 

    Route::get('maba/{id}/show', [MabaController::class, 'show'])->name('maba.show');
    Route::middleware(['Akses:panitia,superadmin'])->group(function () {
        Route::resource('maba', MabaController::class, ['except' => ['show','store', 'create']]);
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
    Route::middleware('Akses:superadmin')->group(function () {
        Route::get('pmb/studi/kouta', [StudyController::class, 'setKouta'])->name('pmb.studi.kouta');
        Route::patch('pmb/studi/kouta/{study}', [StudyController::class, 'setKouta'])->name('pmb.studi.kouta.update');
        Route::post('pmb/close', [PengaturanController::class, 'close'])->name('pmb.close');
        Route::post('pmb/open', [PengaturanController::class, 'open'])->name('pmb.open');
        Route::resource('users', UserController::class, ['except' => ['edit', 'create', 'show']]);
    });
  
});
