@extends('_layouts.back')
@section('extjs')
    <script>
        $(document).ready(function() {
            var max_fields = 50; //maximum input boxes allowed
            var wrapper = $(".input_fields_wrap"); //Fields wrapper
            var add_button = $(".addFaker"); //Add button ID
            var x = 1; //initlal text box count
            $(add_button).click(function(e) { //on add input button click
                e.preventDefault();
                if (x < max_fields) { //max input box allowed
                    x++; //text box increment
                    $(wrapper).append(
                        '<div class="input-group input-group-sm" style="margin-bottom: 10px;"><input type="text" style="font-size:20px; " name="faker[]" class="form-control"><span class="input-group-btn remove"> <button type="button" class="btn btn-danger btn-flat remove">HAPUS</button> </span></div>'
                        );
                }
            });
            $(wrapper).on("click", ".remove", function(e) { //user click on remove text
                e.preventDefault();
                $(this).parent('div').remove();
                x--;
            })
        });
    </script>
@endsection
@section('content')
    <section class="content">
        <div class="container">
            <div class="row">
                <div class="col-md-3">
                </div>
                <div class="col-md-6">
                    <div class="alert alert-danger">
                        <h4><i class="fa fa-bullhorn"></i> &nbsp; BACA SEBELUM MELAKUKAN SUBMIT</h4>
                        <p>Penutupan Pendaftaran Mahasiswa Akan Berpengaruh Kepada Maba Yang Mendaftaran Pada Gelombang Dan
                            Angkatan Saat ini , Apabila Terjadi Penutupan Pendaftaran Maka Status Pendaftaran Akan Di Ubah
                            Statusnya Menjadi Arsip Maka Di MENU > PMB > Data Pendaftar Akan Di pindahkan Di MENU > PMB >
                            Data Arsip </p>
                    </div>
                    <div class="box">
                        <form action="{{ route('back.pmb.close') }}" method="post">
                            @csrf
                            <div class="box-body">
                                <button type="button" class="btn btn-info addFaker" style="margin-bottom: 10px"> + TAMBAH
                                    AKUN FAKER</button>
                                <div class="input_fields_wrap">
                                    <input style="font-size:20px; margin-bottom: 10px" name="faker[]" type="text"
                                        class="form-control input-sm">
                                </div>
                            </div>
                            <div class="box-footer text-center">
                                <button type="submit" class="btn btn-success"> TUTUP PENDAFTARAN</button>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-md-3">
                </div>
            </div>
        </div>
    </section>
@endsection
