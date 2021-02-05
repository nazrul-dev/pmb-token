<?php

use App\Http\Controllers\ArchiveController;
use App\Http\Controllers\CetakController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\FacultyController;
use App\Http\Controllers\MabaController;
use App\Http\Controllers\PengaturanController;
use App\Http\Controllers\PengumumanController;
use App\Http\Controllers\StudyController;
use App\Http\Controllers\TokenController;
use App\Http\Controllers\ValidationController;
use App\Models\Maba;
use App\Models\Pengumuman;
use App\Models\Study;
use \DataTables as Dbs;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Route;
use Laravolt\Indonesia\Models\City;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('home');
});

Route::get('/ajaxstudy/{id}', function ($id) {
    $studies = Study::where('faculty_id', $id)->get();
    return response()->json($studies);
})->name('ajaxstudy');


Route::get('/ajaxcity/{id}', function ($id) {
       $state = \Indonesia::findProvince($id, ['cities']);
    return response()->json($state);
});

Route::get('/ajaxdistrict/{id}', function ($id) {
    $state = \Indonesia::findCity($id, ['districts']);
 return response()->json($state);
});




Auth::routes();

Route::get('/validation', function () {
    return view('validation');
});

Route::post('maba/store', [MabaController::class, 'store'])->name('maba.store');
Route::post('validation', [ValidationController::class, 'validation'])->name('validation');

Route::get('after/store/{email}', function ($email) {

    return view('afterpendaftaran', compact('email'));
})->name('after.store');

Route::middleware('auth')->group(function () {

    Route::name('back.')->prefix('back')->group(function () {
        Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
       

        Route::resources([
            'token' => TokenController::class,
            'faculty' => FacultyController::class,
            'study' => StudyController::class,
            'pengumuman' => PengumumanController::class,
        ]);

        Route::middleware(['maba'])->group(function () {
            Route::get('maba/berkas/{id}', [MabaController::class, 'berkas'])->name('maba.berkas');
            Route::patch('maba/berkas/upload', [MabaController::class, 'berkasUpload'])->name('maba.uploadberkas');
            Route::resource('maba', MabaController::class, ['except' => ['store', 'create']]);
        });

        
        Route::middleware('panitia')->get('ajax/maba', function () {
            $data   = Maba::with(['token', 'biodata', 'biodata.getfakultas', 'biodata.getprodi'])->where('arsip', 0)->latest()->get();
            return Dbs::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $deleteBtn  = '';
                    if (auth()->user()->akses == 'superadmin') {
                        $deleteBtn = '
                        <a href="' . route('back.maba.show', Crypt::encryptString($row->user->id)) . '" class="btn btn-info  btn-xs"><i class="fa fa-eye"></i></a> 
                    ';
                    }
                    $actionBtn = '
                  
                    <a href="' . route('back.maba.show', Crypt::encryptString($row->user->id)) . '" class="btn btn-info  btn-xs"><i class="fa fa-eye"></i></a> 
                    <a href="' . route('back.maba.edit', Crypt::encryptString($row->id)) . '" class="btn btn-warning btn-xs"><i class="fa fa-pencil"></i></a>
                    <a href="' . route('back.maba.berkas', Crypt::encryptString($row->user->id)) . '" class="delete btn btn-success btn-xs"><i class="fa fa-file"></i></a>';
                    return $actionBtn . $deleteBtn;
                })
                ->rawColumns(['action'])
                ->make(true);
        })->name('ajax.maba');

        Route::name('pmb.')->prefix('pmb')->group(function () {
            Route::get('studi/kouta', [StudyController::class, 'setKouta'])->name('studi.kouta');
            Route::patch('studi/kouta/{study}', [StudyController::class, 'setKouta'])->name('studi.kouta.update');
            Route::get('pengaturan', [PengaturanController::class, 'index'])->name('pengaturan');
            Route::post('close', [PengaturanController::class, 'close'])->name('close');
            Route::post('open', [PengaturanController::class, 'open'])->name('open');
            Route::get('arsip', [ArchiveController::class, 'index'])->name('arsip');
            Route::post('cetak', [CetakController::class, 'pmb'])->name('cetak');
        });
    
       
    });
    Route::get('cetak/formulir/{id}', [CetakController::class, 'formulir'])->name('cetak.formulir');
});
