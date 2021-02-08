@extends('_layouts.front')
@section('content')
    <section class="content">
        <div class="row">
            @empty($validData)
            @else
                <div class="col-md-2 col-xs-12">
                </div>
                <div class="col-lg-8 col-xs-12">
                    <div class="callout callout-success">
                        <h4><b>REGISTRASI</b> BERHASIL</h4>
                        <p>Terima Kasih Telah Melakukan Registrasi Di Universitas Pohuwato, Untuk Selanjutya Ikuti Arahan
                            Deskripsi Dibawah</p>
                    </div>
                    <div class="box">
                        <div class="box-header with-border">
                            <h4 class="text-bold">PETUNJUK SELANJUTNYA</h4>
                        </div>
                        <div class="box-body">
                            <p>Silahkan Melakukan Login Di Halaman PANEL MABA Dengan Akun Yang Sudah Di sediakan Di bawah Ini
                                Lengkapi Berkas Persyaratan Anda Ketika Sudah Melakukan Login Ke Halaman Panel Maba <br>
                                <b>"Untuk Link Halaman Maba Ada Pada Email Anda, Untuk Info Lengkapnya Silahkana Hubungi Panitia
                                    Pendaftaran Mahasiswa Baru</p>
                            <hr>
                            <ul>
                                <li><b> EMAIL : {{ $validData->email }}</b></li>
                                <li><b> PASSWORD : {{ $validData->password }}</b></li>
                                <li>Halaman Login : <a href="{{ route('login') }}"> Login PANEL MABA</a></li>
                            </ul>
                            <hr>
                        </div>
                    </div>
                </div>
                <div class="col-md-2 col-xs-12">
                </div>
            @endempty

        </div>
    </section>
@endsection
