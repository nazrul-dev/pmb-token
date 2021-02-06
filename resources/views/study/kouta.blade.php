@extends('_layouts.back')
@section('content')
    <section class="content">
        <div class="row ">
         <div class="col-xs-12">
            @if (Session::has('success'))
            <div class="callout callout-success">
                <h5><i class="fa fa-bullhorn"></i> &nbsp;{{ Session::get('success') }}</h5>
            </div>
        @endif
         </div>
            @foreach ($data as $study)
                <div class="col-md-3">
                    <div class="box ">
                        <form role="form" action="{{ route('back.pmb.studi.kouta.update', $study->id) }}" method="post">
                            @method('patch')
                            @csrf
                            <div class="box-body">
                                <h5> {{ $study->name }}</h5>
                                <div class="form-group">
                                    <label>Set Kouta Penerimaan <br>
                                    <small class="text-danger"> 0 == Unlimited </small>
                                    </label>
                                    <input type="number" name="kouta" value="{{ old('kouta') ?? $study->kouta }}"
                                        class="form-control">
                                </div>
                            </div>
                            <div class="box-footer text-right">
                                <button type="submit" class="btn btn-success">SIMPAN</button>
                            </div>
                        </form>
                    </div>
                </div>
            @endforeach
        </div>
    </section>
@endsection
