@extends('_layouts.back')
@section('content')

<section class="content">
    <div class="row">
       
        <div class="col-md-8">

            <div class="nav-tabs-custom">
                <ul class="nav nav-tabs">

                    <li class="active"><a href="#tab_1" data-toggle="tab">Data Calon Mahasiswa</a></li>
                    <li><a href="#tab_2" data-toggle="tab">Pilihan Pada UNIPO</a></li>
                
                    <li><a href="#tab_3" data-toggle="tab">Berkas Persyaratan</a></li>


                </ul>
                <div class="tab-content">

                    <div class="tab-pane active" id="tab_1">
                        <table class="table table-borderless">
                            <tbody>
                                <tr>
                                    <td width="25%" class="text-right">Token Pendaftaran : </td>
                                    <td>{{ $user->maba->token->token }}</td>
                                </tr>
                                <tr>
                                    <td width="25%" class="text-right">Nomor Pendaftaran : </td>
                                    <td>{{ $user->maba->biodata->no_registrasi }}</td>
                                </tr>
                                <tr>
                                    <td width="25%" class="text-right"> Gelombang : </td>
                                    <td> Gelombang KE - <b>{{ $user->maba->biodata->gelombang }}</b></td>
                                </tr>
                                <tr>
                                    <td width="25%" class="text-right"> Angkatan Pendaftaran : </td>
                                    <td>{{ $user->maba->token->angkatan }} / {{ $user->maba->token->angkatan + 1 }}</td>
                                </tr>

                                <tr>
                                    <td width="20%" class="text-right">Nama Lengkap : </td>
                                    <td>{{  $user->maba->biodata->nama_lengkap }}</td>
                                </tr>
                                <tr>
                                    <td width="20%" class="text-right">Email : </td>
                                    <td>{{  $user->maba->token->email }}</td>
                                </tr>
                                <tr>
                                    <td width="20%" class="text-right"> Tempat/tgl. Lahir : </td>
                                    <td>{{ $user->maba->biodata->tempat_lahir }}, {{ $user->maba->biodata->tanggal_lahir }}</td>
                                </tr>
                                <tr>
                                    <td width="20%" class="text-right"> Jenis kelamin : </td>
                                    <td>{{ $user->maba->biodata->gender }}</td>
                                </tr>
                                <tr>
                                    <td width="20%" class="text-right"> Agama : </td>
                                    <td>{{ $user->maba->biodata->agama }}</td>
                                </tr>
                                <tr>
                                    <td width="20%" class="text-right"> Alamat: </td>
                                    <td>{{ $user->maba->biodata->alamat }}</td>
                                </tr>
                                
                                <tr>
                                    <td width="20%" class="text-right"> Telp/HP : </td>
                                    <td>{{ $user->maba->biodata->telepon }}</td>
                                </tr>
                                <tr>
                                    <td width="20%" class="text-right"> Ukuran Baju : </td>
                                    <td>{{ $user->maba->biodata->ukuran_baju }}</td>
                                </tr>

                            </tbody>
                        </table>
                    </div>
                    <!-- /.tab-pane -->
                    <div class="tab-pane" id="tab_2">
                        <table class="table table-borderless">
                            <tbody>
                                <tr>
                                    <td width="25%" class="text-right">PILIHAN FAKULTAS : </td>
                                    <td>{{ $user->maba->biodata->getfakultas->name }}</td>
                                </tr>
                                <tr>
                                    <td width="25%" class="text-right">PILIHAN PRODI : </td>
                                    <td>{{ $user->maba->biodata->getprodi->name }}</td>
                                </tr>
                                <tr>
                                    <td width="25%" class="text-right"> GELOMBANG : </td>
                                    <td> Gelombang KE - <b>{{ $user->maba->biodata->gelombang }}</b></td>
                                </tr>
                                <tr>
                                    <td width="25%" class="text-right"> ANGKATAN : </td>
                                    <td>{{ $user->maba->token->angkatan }} / {{ $user->maba->token->angkatan + 1 }}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <!-- /.tab-pane -->
                  

                    <div class="tab-pane" id="tab_3">

                        @if ($user->maba->biodata->ijazah)
                            <a class="btn btn-block btn-social btn-success"
                                href="{{ asset('media/berkas/' . $user->maba->biodata->ijazah) }}"
                                data-lightbox="ij-{{ $user->maba->biodata->id }}">
                                <i class="fa fa-check"></i> Ijazah / SKHU
                            </a>
                        @else
                            <button class="btn btn-block btn-social btn-github" disabled>
                                <i class="fa fa-remove"></i> Ijazah / SKHU
                            </button>
                        @endif

                        @if ($user->maba->biodata->passphoto)
                            <a class="btn btn-block btn-social btn-success"
                                href="{{ asset('media/berkas/' . $user->maba->biodata->passphoto) }}"
                                data-lightbox="pp-{{ $user->maba->biodata->id }}">
                                <i class="fa fa-check"></i> Pass Photo
                            </a>
                        @else
                            <button class="btn btn-block btn-social btn-github" disabled>
                                <i class="fa fa-remove"></i> Pass Photo
                            </button>
                        @endif

                        @if ($user->maba->biodata->akta)
                            <a class="btn btn-block btn-social btn-success"
                                href="{{ asset('media/berkas/' . $user->maba->biodata->akta) }}"
                                data-lightbox="akta-{{ $user->maba->biodata->id }}">
                                <i class="fa fa-check"></i> Akta Kelahiran
                            </a>
                        @else
                            <button class="btn btn-block btn-social btn-github" disabled>
                                <i class="fa fa-remove"></i> Akta Kelahiran
                            </button>
                        @endif

                        @if ($user->maba->biodata->kartu_keluarga)
                            <a class="btn btn-block btn-social btn-success"
                                href="{{ asset('media/berkas/' . $user->maba->biodata->kartu_keluarga) }}"
                                data-lightbox="kk-{{ $user->maba->biodata->id }}">
                                <i class="fa fa-check"></i> Kartu Keluarga
                            </a>
                        @else
                            <button class="btn btn-block btn-social btn-github" disabled>
                                <i class="fa fa-remove"></i> Kartu Keluarga
                            </button>
                        @endif
                        @if ($user->maba->biodata->ktp)
                        <a class="btn btn-block btn-social btn-success"
                            href="{{ asset('media/berkas/' . $user->maba->biodata->ktp) }}"
                            data-lightbox="kk-{{ $user->maba->biodata->id }}">
                            <i class="fa fa-check"></i> KTP 
                        </a>
                    @else
                        <button class="btn btn-block btn-social btn-github" disabled>
                            <i class="fa fa-remove"></i> KTP
                        </button>
                    @endif


                    </div>
                    <!-- /.tab-pane -->
                </div>
                <!-- /.tab-content -->
            </div>
            <!-- nav-tabs-custom -->
        </div>

        <div class="col-md-4">

            <div class="box">

                <div class="box-body">
                    @if ($statusberkas === true)
                    <a href="{{ route('cetak.formulir', Crypt::encryptString($user->maba->id)) }}" class="btn btn-block btn-social btn-success">
                        <i class="fa fa-download"></i> Cetak Formulir PDF
                    </a>
                    @endif
                  
                    <a class="btn btn-block btn-social btn-instagram">
                        <i class="fa  fa-commenting"></i> Kirimkan Pesan
                    </a>
                    


                </div>
            </div>

        </div>
    </div>
</section>
  
@endsection
