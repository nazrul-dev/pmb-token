<?php

namespace App\Http\Controllers;

use App\Mail\PmbAccount;
use App\Models\{Biodata, Faculty, Maba, Study, Token, User};
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\{Crypt, DB, Hash, Mail, Validator};

use Image;

class MabaController extends Controller
{

    public function index()
    {
        return view('maba.index');
    }

    public function berkas($id)
    {

        if (auth()->user()->akses == 'maba' || auth()->user()->akses == 'panitia' || auth()->user()->akses == 'superadmin') {
            $user = User::with(['maba.biodata'])->find($id);
            return view('maba.berkas', compact('user'));
        }
    }

    public function berkasUpload(Request $request)
    {


        $request->validate([
            'ijazah'                => 'image|mimes:png,jpg,jpeg',
            'passphoto'             => 'image|mimes:png,jpg,jpeg',
            'akta'                  => 'image|mimes:png,jpg,jpeg',
            'kartu_keluarga'        => 'image|mimes:png,jpg,jpeg',
            'ktp'                   => 'image|mimes:png,jpg,jpeg',
        ]);

        $id = $request->id;

        $biodata = Biodata::findOrFail($id);

        if ($request->hasFile('ijazah')) {

            $ijazah = $this->_berkasUpload($biodata->ijazah, $request->file('ijazah'),  794, 1122);
        }
        if ($request->hasFile('passphoto')) {
            $passphoto = $this->_berkasUpload($biodata->passphoto, $request->file('passphoto'), 120,  170);
        }
        if ($request->hasFile('akta')) {
            $akta = $this->_berkasUpload($biodata->akta, $request->file('akta'), 794, 1122);
        }
        if ($request->hasFile('kartu_keluarga')) {
            $kartu_keluarga = $this->_berkasUpload($biodata->kartu_keluarga, $request->file('kartu_keluarga'),  794, 1122);
        }

        if ($request->hasFile('ktp')) {
            $ktp = $this->_berkasUpload($biodata->ktp, $request->file('ktp'),  794, 1122);
        }

        try {
            $biodata->update([
                'akta'              => $akta ?? $biodata->akta,
                'ijazah'            => $ijazah ?? $biodata->ijazah,
                'passphoto'         => $passphoto ?? $biodata->passphoto,
                'kartu_keluarga'    => $kartu_keluarga ?? $biodata->kartu_keluarga,
                'ktp'               => $ktp ?? $biodata->ktp,
            ]);
        } catch (QueryException $e) {
            return redirect()->back()->with('error', 'Gagal Mengupload Berkas');
        }

        return redirect()->back()->with('success', 'Berhasil Mengupload Berkas');
    }

    public function store(Request $request)
    {

        $validator = Validator::make($request->all(), [

            'nama_lengkap'      => ['required'],
            'email'             => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'tempat_lahir'      => ['required'],
            'tanggal_lahir'     => ['required'],
            'gender'            => ['required'],
            'asal_sekolah'      => ['required'],
            'tahun_lulus'       => ['required'],
            'agama'             => ['required'],
            'ukuran_baju'       => ['required'],
            'alamat'            => ['required'],
            'telepon'           => ['required'],

            'pilihan_kelas'     => ['required'],
            'prodi'             => ['required'],
            'fakultas'          => ['required'],
            'jurusan'           => ['required'],

            'provinsi'          => ['required'], ['numeric'],
            'kabupaten'         => ['required'], ['numeric'],
            'kecamatan'         => ['required'], ['numeric'],

        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }
        $prodi          = Study::find($request->prodi);

        //  ANGKA 1 KOUTA HABIS 
        //  ANGKA 0 KOUTA UNLIMITED
        
        if($prodi->kouta == 1){
            return redirect()->back()->with('error', 'Kouta Untuk Program Studi Ini Sudah Habis, Silahkan Pilih Program Studi Yang Lain');
        }

        $getByDataToken = Token::where(['token' => $request->token, 'email' => $request->email])->firstOrFail();
        if ($getByDataToken->use_token == 0) {

            DB::beginTransaction();

            try {
                $user = User::create([
                    'email' => $getByDataToken->email,
                    'password' => Hash::make($getByDataToken->password),
                    'akses' => 'maba'
                ]);

                $maba = Maba::create([
                    'user_id'       =>  $user->id,
                    'token_id'      =>  $getByDataToken->id
                ]);

                $request->request->add([
                    'no_registrasi' => Biodata::generate_registrasi_number($getByDataToken->angkatan, $getByDataToken->gelombang),
                    'maba_id'  => $maba->id
                ]);





                Biodata::create($request->except(['email', 'token']));


                DB::commit();
                $getByDataToken->update(['use_token' => 1]);
               
                if($prodi->kouta > 1){
                    $prodi->decrement('kouta', 1); 
                }
                
                // $this->send_email_account($getByDataToken);
              
                return redirect(route('after.store', $user->email));
            } catch (\Exception $e) {
                return redirect()->back();
            }
        } else {
            return abort('404');
        }
    }

    private function _berkasUpload($name = '', $berkasRequest,  int $w, int $h)
    {

        if ($name != '') {
            $this->remove_image_one('media/berkas/' . $name);
        }

        $filename       = time() . '.' . $berkasRequest->extension();
        $oriPath        = 'media/berkas/' . $filename;
        $url            = Image::make($berkasRequest->getRealPath())->fit($w, $h);
        $url->save($oriPath);
        return $filename;
    }

    public function show($id)
    {

      
        if (auth()->user()->akses == 'maba' || auth()->user()->akses == 'panitia' || auth()->user()->akses == 'superadmin') {
            $user = User::with(['maba.token', 'maba.biodata', 'maba.biodata.getfakultas', 'maba.biodata.getprodi'])->find($id);
            $statusberkas = Maba::cekberkas($user->maba->biodata->id);
            return view('maba.show', compact(['user', 'statusberkas']));
        }


        return redirect()->back();
    }

    public function edit($id)
    {
        $faculties = Faculty::get();
      
        if (auth()->user()->akses == 'panitia' || auth()->user()->akses == 'superadmin') {
            $maba = Maba::with(['token', 'biodata', 'biodata.getfakultas', 'biodata.getprodi'])->find($id);
            return view('maba.edit', compact(['maba', 'faculties']));
        }
        return redirect()->back();
    }


    public function update($id)
    {

      
        $biodata = Biodata::findOrFail($id);

        $validator = Validator::make(request()->all(), [

            'nama_lengkap'      => ['required'],
            'tempat_lahir'      => ['required'],
            'tanggal_lahir'     => ['required'],
            'gender'            => ['required'],
            'asal_sekolah'      => ['required'],
            'tahun_lulus'       => ['required'],
            'agama'             => ['required'],
            'ukuran_baju'       => ['required'],
            'alamat'            => ['required'],
            'telepon'           => ['required'],

            'pilihan_kelas'     => ['required'],
            'prodi'             => ['required'],
            'fakultas'          => ['required'],
            'jurusan'           => ['required'],

            'provinsi'          => ['required'], ['numeric'],
            'kabupaten'         => ['required'], ['numeric'],
            'kecamatan'         => ['required'], ['numeric'],


        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }


        $biodata->update(request()->all());

        return redirect(route('back.maba.index'))->with('success', 'Mengupdate Data Biodata Calon Mahasiswa');
    }

    public function destroy(Maba $maba)
    {
        //
    }
}
