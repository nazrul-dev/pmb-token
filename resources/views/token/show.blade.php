@extends('_layouts.back')

@section('content')

    <section class="content" style="  max-width: 400px;">
        <div class="box">
            <div class="box-body">
                <div class="text-center">
                    <img width="64px" style="vertical-align: baseline; margin-right:5px; margin-top:10px"
                        src="http://unipo.niagalancer.com/media/other/logoone.png" alt="">
                    <p class="text-bold h3" style="margin-top: 1px; vertical-align: baseline;">STRUK TOKEN PMB
                        2020</p>
                </div>
                <hr>
                <div class="row">
                    <div class="col-md-6 col-xs-6 text-left">
                        <span style="margin-left:5px">Pembuatan Token</span>
                        <h5 class="text-bold" style="margin-top: 1px; margin-left:5px">{{ $token->created_at }}</h5>
                    </div>
                    <div class="col-md-6 col-xs-6 text-right">
                        <span style="margin-right:5px">Pembuat</span>
                        {{-- <h5 class="text-bold" style="margin-top: 1px; margin-right:5px">{{ $token->generated->name }}</h5> --}}
                    </div>
                  
                    <div class="col-md-12 text-center">
                        <span style="margin-right:5px">Email</span>
                        <h5 class="text-bold" style="margin-top: 1px;margin-right:5px">{{ $token->email }}</h5>
                    </div>
                    <div class="col-md-12 text-center" style="margin-top: 1rem">
                        <span>Nomor Token</span>
                        <h3 class="text-bold" style="margin-top: 5px">{{ $token->token }}</h3>
                        <hr style="border: 1px black dashed">
                    </div>
                    <div class="col-md-6 col-xs-6 text-center">
                        <span>Gelombang</span>
                        <h3 class="text-bold" style="margin-top: 1px">KE - {{ $token->gelombang }}</h3>
                    </div>
                    <div class="col-md-6 col-xs-6 text-center">
                        <span>Angkatan</span>
                        <h3 class="text-bold" style="margin-top: 1px; padding-bottom:10px">{{ $token->angkatan }} - {{ $token->angkatan+1 }}</h3>
                    </div>
                </div>
                <button class="btn btn-success btn-block">PRINT STRUK PMB</button>

            </div>
        </div>
    </section>

@endsection
