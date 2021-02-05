@extends('_layouts.front')
@section('extjs')
<script>
    $('.token').keyup(function() {
        var foo = $(this).val().split("-").join(""); // remove hyphens
        if (foo.length > 0) {
            foo = foo.match(new RegExp('.{1,4}', 'g')).join("-");
        }
        $(this).val(foo);
    });
    (function($) {
        $.fn.inputFilter = function(inputFilter) {
            return this.on("input keydown keyup mousedown mouseup select contextmenu drop", function() {
                if (inputFilter(this.value)) {
                    this.oldValue = this.value;
                    this.oldSelectionStart = this.selectionStart;
                    this.oldSelectionEnd = this.selectionEnd;
                } else if (this.hasOwnProperty("oldValue")) {
                    this.value = this.oldValue;
                    this.setSelectionRange(this.oldSelectionStart, this.oldSelectionEnd);
                } else {
                    this.value = "";
                }
            });
        };
    }(jQuery));

    $(".token").inputFilter(function(value) {

        return /^[\d ()+-]+$/.test(value); // Allow digits only, using a RegExp
    });

    $(".token").keyup(function() {
        var maxChars = 24;
        if ($(this).val().length > maxChars) {
            $(this).val($(this).val().substr(0, maxChars));

        }
    });

</script>
@endsection
@section('content')
    <section class="content">
        <div class="register-box">
            <div class="login-logo">
                <a href="../../index2.html"><b>REGISTRASI</b> TOKEN</a>
            </div>

            @if (Session::has('error'))
                <div class="callout callout-danger">
                    <h4><i class="fa fa-bullhorn"></i> &nbsp; Pesan Kesalahan</h4>
                    <p>{{ Session::get('error') }}</p>
                </div>
            @endif
            @if ($errors->any())
                <div class="alert alert-danger">
                    <h4><i class="fa fa-bullhorn"></i> &nbsp; Pesan Kesalahan</h4>
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <div class="register-box-body">


                <form action="{{ route('validation') }}" method="post">
                    @csrf
                    <div class="form-group has-feedback">
                        <label>EMAIL</label>
                        <input type="email" value="{{ old('email') }}" name="email" class="form-control"
                            placeholder="john@gmail.com">
                        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                        @error('email')
                            <p class="text-danger">
                                {{ $message }}
                            </p>
                        @enderror
                    </div>
                    <div class="form-group has-feedback">
                        <label>TOKEN</label>
                        <input type="text" name="token" value="{{ old('token') }}" class="form-control token"
                            placeholder="xxxx-xxxx-xxxx-xxxx">
                        <span class="glyphicon glyphicon-barcode form-control-feedback"></span>

                        @error('token')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="form-group">
                        <button type="submit" class="btn btn-success btn-noborder btn-block btn-flat">Register
                            Token</button>
                    </div>
                </form>

                <hr>
                <a href="login.html" class="text-center text-black">Belum Punya Token Pendaftaran ?</a>
            </div>
        </div>

    </section>
@endsection
