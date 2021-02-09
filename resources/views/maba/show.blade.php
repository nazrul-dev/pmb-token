@extends('_layouts.back')
@section('content')
    <section class="content">
        <div class="row">
            <div class="col-md-2 col-xs-12">

            </div>
            <div class="col-md-8 col-xs-12">
                <div class="nav-tabs-custom">
                    <div class="box-header with-border">
                        <h3 class="box-title">DATA FORMULIR MABA </h3>

                        <div class="box-tools pull-right">
                            @if ($statusberkas === true)
                                <a href="{{ route('back.maba.cetak.formulir', $user->maba->uuid) }}"
                                    class="btn btn-block btn-social btn-success">
                                    <i class="fa fa-download"></i> Cetak
                                </a>
                            @endif
                            </button>
                        </div>
                        <!-- /.box-tools -->
                    </div>
                    <ul class="nav nav-tabs">
                        <li class="active"><a href="#tab_1" data-toggle="tab">Infromasi Maba</a></li>

                        <li><a href="#tab_2" data-toggle="tab">Berkas Persyaratan</a></li>

                    </ul>

                    <div class="tab-content">
                        <div class="tab-pane active" id="tab_1">
                            <div class="table-responsive">
                                <table class="table table-borderless">
                                    <tbody>
                                        <tr class="text-left text-bold bg-green">
                                            <td colspan="2"> INFORMASI DATA DIRI</td>
                                        </tr>
                                        <tr>
                                            <td width="25%" class="text-right text-bold">TOKEN PENDAFTARAN : </td>
                                            <td>{{ $user->maba->token->token }}</td>
                                        </tr>
                                        <tr>
                                            <td width="25%" class="text-right text-bold">NO.PENDAFTARAN : </td>
                                            <td>{{ $user->maba->biodata->no_registrasi }}</td>
                                        </tr>
                                        
                                      
                                        <tr>
                                            <td width="20%" class="text-right text-bold">NAMA LENGKAP : </td>
                                            <td>{{ $user->maba->biodata->nama_lengkap }}</td>
                                        </tr>
                                        <tr>
                                            <td width="20%" class="text-right text-bold">EMAIL : </td>
                                            <td>{{ $user->maba->token->email }}</td>
                                        </tr>
                                        <tr>
                                            <td width="20%" class="text-right text-bold"> TEMPAT TGL LAHIR : </td>
                                            <td>{{ $user->maba->biodata->tempat_lahir }},
                                                {{ $user->maba->biodata->tanggal_lahir }}</td>
                                        </tr>
                                        <tr>
                                            <td width="20%" class="text-right text-bold"> JENIS KELAMIN : </td>
                                            <td>{{ $user->maba->biodata->gender }}</td>
                                        </tr>
                                        <tr>
                                            <td width="20%" class="text-right text-bold">AGAMA : </td>
                                            <td>{{ $user->maba->biodata->agama }}</td>
                                        </tr>

                                       
                                        <tr>
                                            <td width="20%" class="text-right text-bold"> PROVINSI : </td>
                                            <td>{{ get_provinsi($user->maba->biodata->provinsi) }}</td>
                                        </tr>
                                        <tr>
                                            <td width="20%" class="text-right text-bold"> KABUPATEN/KOTA : </td>
                                            <td>{{ get_kabupaten($user->maba->biodata->kabupaten)}}</td>
                                        </tr>
                                        <tr>
                                            <td width="20%" class="text-right text-bold"> KECAMATAN : </td>
                                            <td>{{ get_kecamatan($user->maba->biodata->kecamatan)}}</td>
                                        </tr>
                                        <tr>
                                            <td width="20%" class="text-right text-bold"> ALAMAT: </td>
                                            <td>{{ $user->maba->biodata->alamat }}</td>
                                        </tr>
                                        <tr>
                                            <td width="20%" class="text-right text-bold"> TELP/HP : </td>
                                            <td>{{ $user->maba->biodata->telepon }}</td>
                                        </tr>
                                        <tr>
                                            <td width="20%" class="text-right text-bold"> UKURAN BAJU : </td>
                                            <td>{{ $user->maba->biodata->ukuran_baju }}</td>
                                        </tr>
                                        <tr class="text-left text-bold bg-green">
                                            <td colspan="2"> JURUSAN YANG DIPILIH</td>
                                        </tr>
                                        <tr>
                                            <td width="25%" class="text-right text-bold ">PILIHAN FAKULTAS : </td>
                                            <td>{{ $user->maba->biodata->getfakultas->name }}</td>
                                        </tr>
                                        <tr>
                                            <td width="25%" class="text-right text-bold">PILIHAN PRODI : </td>
                                            <td>{{ $user->maba->biodata->getprodi->name }}</td>
                                        </tr>
                                        <tr>
                                            <td width="25%" class="text-right text-bold"> GELOMBANG : </td>
                                            <td> Gelombang KE - <b>{{ $user->maba->token->gelombang }}</b></td>
                                        </tr>
                                        <tr>
                                            <td width="25%" class="text-right text-bold"> ANGKATAN : </td>
                                            <td>{{ $user->maba->token->angkatan }} /
                                                {{ $user->maba->token->angkatan + 1 }}</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>

                        <div class="tab-pane" id="tab_2">
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
            <div class="col-md-2 col-xs-12">

            </div>
        </div>
    </section>
@endsection
