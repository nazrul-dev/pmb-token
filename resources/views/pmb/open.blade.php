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
                    <div class="alert alert-success">
                        <h4><i class="fa fa-bullhorn"></i> &nbsp; BACA SEBELUM MELAKUKAN MEMBUKA PMB</h4>
                    </div>
                    <div class="box">
                        <form action="{{ route('back.pmb.open') }}" method="post">
                            @csrf
                            <div class="box-body">
                                {{-- <div class="col-md-12 col-xs-6">
                                    <div class="form-group">
                                        <label>JUDUL</label>
                                        <input type="number" name="gelombang" class="form-control" placeholder="1">
                                    </div>
                                </div>
                                <div class="col-md-12 col-xs-6">
                                    <div class="form-group">
                                        <label>DESKRIPSI</label>
                                        <textarea name="desc" id="" cols="30" rows="10"></textarea>
                                     
                                    </div>
                                </div>
                                <div class="col-md-12 col-xs-6">
                                    <div class="form-group">
                                        <label>LINK PMB</label>
                                        <input type="number" name="desc" class="form-control" placeholder="1">
                                    </div>
                                </div> --}}
                                <div class="col-md-12 col-xs-6">
                                    <div class="form-group">
                                        <label>GELOMBANG</label>
                                        <input type="number" name="gelombang" class="form-control" placeholder="1">
                                    </div>
                                </div>
                              
                            </div>
                            <div class="box-footer text-center">
                                <button type="submit" class="btn btn-success"> BUKA PENDAFTARAN</button>
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
