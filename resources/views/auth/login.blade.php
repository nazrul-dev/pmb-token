@extends('_layouts.front')
@section('content')
<section class="content">
    <div class="register-box " >
        <div class="login-logo">
            <b>LOGIN PANEL PMB</b>
        </div>
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
        <div class="register-box-body" style="box-shadow: 10px 10px #888888a8;">
            <form method="POST" action="{{ route('login') }}">
                @csrf
                <div class="form-group">
                    <label>EMAIL</label>
                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group ">
                    <label>PASSWORD</label>
                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-success">
                        {{ __('Login') }}
                    </button>
                    @if (Route::has('password.request'))
                        <a class="btn btn-link" href="{{ route('password.request') }}">
                           Lupa Password
                        </a>
                    @endif
                </div>
            </form>
        </div>
    </div>
</section>
@endsection
