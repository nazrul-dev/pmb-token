@extends('_layouts.back')
@section('content')
    <section class="content">
        <div class="row ">
            <div class="col-md-3">
                <div class="clearfix"></div>
            </div>
            <div class="col-md-6">
                @if ($errors->any())
                    <div class="callout callout-danger">
                        <h4>Pesan Kesalahan</h4>
                        @foreach ($errors->all() as $error)
                            <p>{{ $error }}</p>
                        @endforeach
                    </div>
                @endif
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">{{ $title }}</h3>
                       
                    </div>

                    <form role="form" action="{{ $route }}" method="post">
                        @csrf
                        <div class="box-body">
                            <div class="form-group">
                                <label>Nama {{ $label }}</label>
                                <input type="text" value="{{ old('name') }}" name="name" class="form-control" placeholder="{{ $label }}">
                            </div>
                        </div>
                        
                        <div class="box-footer text-right">
                            <button type="submit" class="btn btn-success">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-md-3">
                <div class="clearfix"></div>
            </div>

        </div>


    </section>
@endsection
