@extends('_layouts.back')

@section('content')
    <section class="content">
        <div class="row justify-content-center">
            <div class="col-md-4">
                <div class="clearfix"></div>
            </div>
            <div class="col-md-4">
                @if ($errors->any())
                <div class="callout callout-danger">
                    <h4>I am a danger callout!</h4>
                    @foreach ($errors->all() as $error)
                        <p>{{ $error }}</p>
                    @endforeach
    
                </div>
    
            @endif
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title text-bold">FORM PEMBUATAN TOKEN</h3>
                    </div>
                    <!-- /.box-header -->
                    <!-- form start -->
                    <form role="form" action="{{ route('back.token.store') }}" method="post">
                        @csrf
                        <div class="box-body">
                           
                            <div class="row">

                                <div class="col-md-12 col-xs-12">
                                    <div class="form-group">
                                        <label>EMAIL</label>
                                        <input type="email" name="email" class="form-control"
                                            placeholder="john@gmail.com">
                                    </div>
                                </div>
                                
                            </div>

                        </div>
                        <!-- /.box-body -->

                        <div class="box-footer text-right">
                            <button type="submit" class="btn btn-success">BUAT TOKEN</button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-md-i">
                <div class="clearfix"></div>
            </div>

        </div>


    </section>
@endsection
