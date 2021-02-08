@extends('_layouts.back')
@section('content')
    <section class="content" style="  max-width: 400px;">
        <div class="box">
            <div class="box-body">
                <div class="text-center">
                   
                    <p class="text-bold h3" style="margin-top: 10px; vertical-align: baseline;">STRUK TOKEN PMB
                        </p>
                       
                </div>
              
                <div class="row">
                  
                    <div class="col-xs-12 text-center">
                        <span style="margin-right:5px">Email Pembuat</span>
                        <h5 class="text-bold" style="margin-top: 1px; margin-right:5px">{{ $token->generated->email}} <br>{{ $token->created_at }}</h5>
                       
                    </div>
                    
                    <div class="col-md-12 text-center">
                        <hr>
                        <span style="margin-right:5px">Email Pendaftar</span>
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
   
            </div>
        </div>
    </section>
@endsection
