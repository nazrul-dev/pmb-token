@extends('_layouts.back')

@section('extjs')

    <script>
        $('#faculty').on('change', function() {
            showStudy($(this).val());

        });

        function showStudy(id = '') {

            var url = "{{ url('/ajaxstudy') }}";

            $.ajax({
                url: url + '/' + id,
                type: "GET",
                dataType: 'json',
                success: function(data) {
                    $('#study').empty('.study-item');

                    if (data.length === 0) {
                        $('#study').prop('disabled', true);
                    } else {
                        $('#study').prop('disabled', false);
                        jQuery.each(data, function(index, item) {
                            $('#study').append('<option class="study-item" value="' + item.id + '">' +
                                item.name + '</option>');
                        });
                    }

                }
            });
        }

    </script>

@endsection
@section('content')
    <section class="content">
        <div class="col-md-2"></div>
        <div class="col-md-8">
            <div class="box">
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <div class="box-body">
                    <form method="POST" class="form-horizontal" action="{{ route('back.maba.update', Crypt::encryptString($maba->biodata->id)) }}" autocomplete="OFF">
                        @method('patch')
                        @csrf
                        <hr>
                        <h4 class="text-bold text-lg">&nbsp; &nbsp;&nbsp;&nbsp;Data Diri Calon Mahasiswa</h4>
                        <hr>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Nama Lengkap</label>
                            <div class="col-sm-7">
                                <input type="text" name="nama_lengkap" class="form-control" value="{{ $maba->biodata->nama_lengkap }}" >
                            </div>
                        </div>
                     
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Tempat Lahir</label>

                            <div class="col-sm-6">
                                <input type="text" value="{{ $maba->biodata->tempat_lahir }}" name="tempat_lahir" class="form-control" placeholder="cth: Marisa">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Tanggal Lahir</label>

                            <div class="col-sm-5">
                                <input type="text" name="tanggal_lahir" placeholder="1998-02-09" value="{{ $maba->biodata->tanggal_lahir }}" class="form-control date">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Jenis kelamin</label>

                            <div class="col-sm-5">
                                <select name="gender" class="form-control" id="">
                                    <option value="Laki-laki" {{ $maba->biodata->gender === 'Laki-laki' ? "selected" : "" }}>Laki-laki</option>
                                    <option value="Perempuan" {{ $maba->biodata->gender === 'Perempuan' ? "selected" : "" }}>Perempuan</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Asal Sekolah</label>

                            <div class="col-sm-7">
                                <input type="text" name="asal_sekolah" class="form-control"
                                    placeholder="cth: SMA 1 POHUWATO" value="{{ $maba->biodata->asal_sekolah }}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Tahun Lulus</label>

                            <div class="col-sm-3">
                                <input type="number" name="tahun_lulus" value="{{ $maba->biodata->tahun_lulus }}" class="form-control" placeholder="cth:2020">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Agama</label>

                            <div class="col-sm-5">
                                <select name="agama" class="form-control" id="">
                                    <option value="Islam" {{ $maba->biodata->agama === 'Islam' ? "selected"  : ""}} >Islam</option>
                                    <option value="Katolik" {{ $maba->biodata->agama === 'Katolik' ? "selected"  : ""}} >Kristen Katolik</option>
                                    <option value="Protestan" {{ $maba->biodata->agama === 'Protestan' ? "selected"  : ""}} >Kristen Protestan</option>
                                    <option value="Hindu" {{ $maba->biodata->agama === 'Hindu' ? "selected"  : ""}} >Hindu</option>
                                    <option value="Budha" {{ $maba->biodata->agama === 'Budha' ? "selected"  : ""}} >Budha</option>
                                    <option value="Konghucu" {{ $maba->biodata->agama === 'Konghucu' ? "selected"  : ""}} >Konghucu</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Ukuran Baju</label>

                            <div class="col-sm-5">
                                <select name="ukuran_baju" class="form-control" id="">
                                    <option value="XXL" {{ $maba->biodata->ukuran_baju === 'XXL' ? "selected"  : ""}} >XXL</option>
                                    <option value="XL" {{ $maba->biodata->ukuran_baju === 'XL' ? "selected"  : ""}} >XL</option>
                                    <option value="L" {{ $maba->biodata->ukuran_baju === 'L' ? "selected"  : ""}} >L</option>
                                    <option value="M" {{ $maba->biodata->ukuran_baju === 'M' ? "selected"  : ""}} >M</option>
                                    <option value="S" {{ $maba->biodata->ukuran_baju === 'S' ? "selected"  : ""}} >S</option>
                                
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Jurusan</label>

                            <div class="col-sm-5">
                                <select name="jurusan" class="form-control" id="">
                                    <option value="IPA" {{ $maba->biodata->jurusan === 'IPA' ? "selected"  : ""}}>IPA</option>
                                    <option value="IPS" {{ $maba->biodata->jurusan === 'IPs' ? "selected"  : ""}}>IPS</option>
                                    <option value="BAHASA" {{ $maba->biodata->jurusan === 'BAHASA' ? "selected"  : ""}}>BAHASA</option>
                                    <option value="LAINNYA" {{ $maba->biodata->jurusan === 'LAINNYA' ? "selected"  : ""}}>LAINNYA</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Alamat</label>

                            <div class="col-sm-7">
                                <input type="text" value="{{ $maba->biodata->alamat }}" name="alamat" class="form-control"
                                    placeholder="cth Jl. Trans Sulawesi">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Telp/HP</label>

                            <div class="col-sm-5">
                                <input type="number" value="{{ $maba->biodata->telepon }}" name="telepon" class="form-control" placeholder="cth: 082291281291">
                            </div>
                        </div>

                       
                        <hr>
                        <h4 class="text-bold text-lg">&nbsp; &nbsp;&nbsp;&nbsp;Pilihan Pada Universitas Pohuwato</h4>
                        <hr>

                        <div class="form-group">
                            <label class="col-sm-3 control-label">pilihan kelas</label>

                            <div class="col-sm-7">
                                <select name="pilihan_kelas" class="form-control" id="">
                                    <option value="pagi" {{ $maba->biodata->pilihan_kelas === 'pagi' ? "selected"  : ""}}> Reguler Pagi</option>
                                    <option value="sore" {{ $maba->biodata->pilihan_kelas === 'sore' ? "selected"  : ""}}> Reguler Sore</option>
                                </select>
                            </div>
                        </div>


                        <div class="form-group">
                            <label class="col-sm-3 control-label">Fakultas</label>

                            <div class="col-sm-7">
                                <select name="fakultas" class="form-control" id="faculty">
                                    <option value="" disabled> Pilih Fakultas</option>
                                    @foreach ($faculties as $faculty)
                                        <option value="{{ $faculty->id }}" {{ $faculty->id == $maba->biodata->fakultas ? "selected" : "" }}>{{ $faculty->name }}</option>
                                    @endforeach
                                </select>

                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-3 control-label">studi</label>

                            <div class="col-sm-7">
                                <select name="prodi" class="form-control" id="study" disabled>
                                    <option class="study-item" value="{{ $maba->biodata->prodi }}" selected>{{ $maba->biodata->getprodi->name }}</option>
                                </select>
                            </div>
                        </div>
                        <hr>
                        
                        <div class="form-group">
                           <button class="btn btn-success btn-block btn-lg font-bold text-lg h1">EDIT FORMULIR</button>
                        </div>
                       
                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-2"></div>
    </section>

@endsection

