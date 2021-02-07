@extends('_layouts.back')
@section('content')
    @php
    $id = $user->maba->biodata->uuid
    @endphp
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                @if ($errors->any())
                    <div class="callout callout-danger">
                        <h4>Pesan Kesalahan</h4>
                        @foreach ($errors->all() as $error)
                            <p>{{ $error }}</p>
                        @endforeach
                    </div>
                @endif
                @if (Session::has('success'))
                    <div class="callout callout-success">
                        <h5><i class="fa fa-bullhorn"></i> &nbsp;{{ Session::get('success') }}</h5>
                    </div>
                @endif
            </div>
            <div class="col-md-3">
                <div class="box">
                    <form action="{{ route('back.maba.uploadberkas') }}" method="post" enctype="multipart/form-data">
                        @method('patch')
                        @csrf
                        <div class="box-body">
                            <div class="row">
                                <div class="col-xs-6">
                                    @if ($user->maba->biodata->ijazah)
                                        <img width="60" height="86"
                                            src="{{ asset('media/berkas/' . $user->maba->biodata->ijazah) }}" alt="">
                                    @else
                                        <img width="60" height="86" src="{{ asset('icon/ijazah.jpg') }}" alt="">
                                    @endif
                                </div>
                                <div class="col-xs-6 text-center">
                                    @if ($user->maba->biodata->ijazah)
                                        <img width="60" height="60" src="{{ asset('icon/yes.png') }}" alt="">
                                    @else
                                        <img width="60" height="60" src="{{ asset('icon/no.png') }}" alt="">
                                    @endif
                                </div>
                                <div class="col-xs-12 border">
                                    <div class="form-group">
                                        <br>
                                        <label for="ijazah">Ijazah / SKHU </label>
                                        <input type="file" required id="ijazah" name="ijazah">
                                        <p class="help-block">Format File JPG|PNG</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="box-footer">
                            <input type="hidden" name="id" value="{{ $id }}">
                            @if (empty($user->maba->biodata->ijazah) || auth()->user()->akses === 'panitia' || auth()->user()->akses === 'superadmin')
                                <button type="submit" class="btn btn-success btn-block">Upload Berkas</button>
                            @else
                                <button type="button" class="btn btn-success btn-block" disabled>Upload Berkas</button>
                            @endif
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-md-3">
                <div class="box">
                    <form action="{{ route('back.maba.uploadberkas') }}" method="post" enctype="multipart/form-data">
                        @method('patch')
                        @csrf
                        <div class="box-body">
                            <div class="row">
                                <div class="col-xs-6">
                                    @if ($user->maba->biodata->akta)
                                        <img width="60" height="86"
                                            src="{{ asset('media/berkas/' . $user->maba->biodata->akta) }}" alt="">
                                    @else
                                        <img width="60" height="86" src="{{ asset('icon/akta.jpg') }}" alt="">
                                    @endif
                                </div>
                                <div class="col-xs-6 text-center">
                                    @if ($user->maba->biodata->akta)
                                        <img width="60" height="60" src="{{ asset('icon/yes.png') }}" alt="">
                                    @else
                                        <img width="60" height="60" src="{{ asset('icon/no.png') }}" alt="">
                                    @endif
                                </div>
                                <div class="col-xs-12 border">
                                    <div class="form-group">
                                        <br>
                                        <label for="akta">Akta Kelahiran</label>
                                        <input type="file" required id="akta" name="akta">
                                        <p class="help-block">Format File JPG|PNG</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="box-footer">
                            <input type="hidden" name="id" value="{{ $id }}">
                            @if (empty($user->maba->biodata->akta) || auth()->user()->akses === 'panitia' || auth()->user()->akses === 'superadmin')
                                <button type="submit" class="btn btn-success btn-block">Upload Berkas</button>
                            @else
                                <button type="button" class="btn btn-success btn-block" disabled>Upload Berkas</button>
                            @endif
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-md-3">
                <div class="box">
                    <form action="{{ route('back.maba.uploadberkas') }}" method="post" enctype="multipart/form-data">
                        @method('patch')
                        @csrf
                        <div class="box-body">
                            <div class="row">
                                <div class="col-xs-6">
                                    @if ($user->maba->biodata->passphoto)
                                        <img width="60" height="86"
                                            src="{{ asset('media/berkas/' . $user->maba->biodata->passphoto) }}" alt="">
                                    @else
                                        <img width="60" height="86" src="{{ asset('icon/passphoto.jpg') }}" alt="">
                                    @endif
                                </div>
                                <div class="col-xs-6 text-center">
                                    @if ($user->maba->biodata->passphoto)
                                        <img width="60" height="60" src="{{ asset('icon/yes.png') }}" alt="">
                                    @else
                                        <img width="60" height="60" src="{{ asset('icon/no.png') }}" alt="">
                                    @endif
                                </div>
                                <div class="col-xs-12 border">
                                    <div class="form-group">
                                        <br>
                                        <label for="passphoto">Pass Photo 3X4</label>
                                        <input type="file" required id="passphoto" name="passphoto">
                                        <p class="help-block">Format File JPG|PNG</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="box-footer">
                            <input type="hidden" name="id" value="{{ $id }}">
                            @if (empty($user->maba->biodata->passphoto) || auth()->user()->akses === 'panitia' || auth()->user()->akses === 'superadmin')
                                <button type="submit" class="btn btn-success btn-block">Upload Berkas</button>
                            @else
                                <button type="button" class="btn btn-success btn-block" disabled>Upload Berkas</button>
                            @endif
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-md-3">
                <div class="box">
                    <form action="{{ route('back.maba.uploadberkas') }}" method="post" enctype="multipart/form-data">
                        @method('patch')
                        @csrf
                        <div class="box-body">
                            <div class="row">
                                <div class="col-xs-6">
                                    @if ($user->maba->biodata->kartu_keluarga)
                                        <img width="60" height="86"
                                            src="{{ asset('media/berkas/' . $user->maba->biodata->kartu_keluarga) }}"
                                            alt="">
                                    @else
                                        <img width="60" height="86" src="{{ asset('icon/kk.jpg') }}" alt="">
                                    @endif
                                </div>
                                <div class="col-xs-6 text-center">
                                    @if ($user->maba->biodata->kartu_keluarga)
                                        <img width="60" height="60" src="{{ asset('icon/yes.png') }}" alt="">
                                    @else
                                        <img width="60" height="60" src="{{ asset('icon/no.png') }}" alt="">
                                    @endif
                                </div>
                                <div class="col-xs-12 border">
                                    <div class="form-group">
                                        <br>
                                        <label for="kartu_keluarga">Kartu Keluarga</label>
                                        <input type="file" required id="kartu_keluarga" name="kartu_keluarga">
                                        <p class="help-block">Format File JPG|PNG</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="box-footer">
                            <input type="hidden" name="id" value="{{ $id }}">
                            @if (empty($user->maba->biodata->kartu_keluarga) || auth()->user()->akses === 'panitia' || auth()->user()->akses === 'superadmin')
                                <button type="submit" class="btn btn-success btn-block">Upload Berkas</button>
                            @else
                                <button type="button" class="btn btn-success btn-block" disabled>Upload Berkas</button>
                            @endif
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-md-3">
                <div class="box">
                    <form action="{{ route('back.maba.uploadberkas') }}" method="post" enctype="multipart/form-data">
                        @method('patch')
                        @csrf
                        <div class="box-body">
                            <div class="row">
                                <div class="col-xs-6">
                                    @if ($user->maba->biodata->ktp)
                                        <img width="60" height="86"
                                            src="{{ asset('media/berkas/' . $user->maba->biodata->ktp) }}" alt="">
                                    @else
                                        <img width="60" height="86" src="{{ asset('icon/kk.jpg') }}" alt="">
                                    @endif
                                </div>
                                <div class="col-xs-6 text-center">
                                    @if ($user->maba->biodata->ktp)
                                        <img width="60" height="60" src="{{ asset('icon/yes.png') }}" alt="">
                                    @else
                                        <img width="60" height="60" src="{{ asset('icon/no.png') }}" alt="">
                                    @endif
                                </div>
                                <div class="col-xs-12 border">
                                    <div class="form-group">
                                        <br>
                                        <label for="ktp">KTP</label>
                                        <input type="file" required id="ktp" name="ktp">
                                        <p class="help-block">Format File JPG|PNG</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="box-footer">
                            <input type="hidden" name="id" value="{{ $id }}">
                            @if (empty($user->maba->biodata->ktp) || auth()->user()->akses === 'panitia' || auth()->user()->akses === 'superadmin')
                                <button type="submit" class="btn btn-success btn-block">Upload Berkas</button>
                            @else
                                <button type="button" class="btn btn-success btn-block" disabled>Upload Berkas</button>
                            @endif
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection
