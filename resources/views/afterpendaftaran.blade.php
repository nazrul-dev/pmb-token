@extends('_layouts.front')
@section('content')
    <section class="content">
        <div class="row">
            <div class="col-md-2 col-xs-12">
            </div>
            <div class="col-lg-8 col-xs-12">
                <div class="callout callout-success">
                    <h4><b>REGISTRASI</b> BERHASIL</h4>
                    <p>Terima Kasih Telah Melakukan Registrasi Di Universitas Pohuwato,  Untuk Selanjutya Ikuti Arahan Deskripsi Dibawah</p>
                  </div>
                <div class="box">
                    <div class="box-header with-border">
                        <h4 class="text-bold">PETUNJUK SELANJUTNYA</h4>
                    </div>
                    <div class="box-body">
                        <ul>
                            <li>
                                <p>Silahakan Cek Email Anda Untuk Melihat Password Anda  , <br> Email Yang Anda Gunakan <b>{{ $email }}</b></p>
                            </li>
                            <li>
                                <p>Lengkapi Berkas Persyaratan Anda Ketika Sudah Melakukan Login Ke Halaman Panel Maba <br> <b>"Untuk Link Halaman Maba Ada Pada Email Anda, Untuk Info Lengkapnya Silahkana Hubungi Panitia Pendaftaran Mahasiswa Baru"</b></p>
                            </li>
                            <li>
                                Kontak Yang Bisa DiHubungi
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-md-2 col-xs-12">
            </div>
        </div>
    </section>
    @endsection
