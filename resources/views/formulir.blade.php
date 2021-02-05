@extends('_layouts.front')

@section('extjs')

    <script>
        $('#faculty').on('change', function() {
            showStudy($(this).val());

        });



        $(function() {
            $('#province').on('change', function() {
                $('.fg-kec').hide();
                $('.fg-kec').hide();
                let id = $(this).val();
                let url = "{{ url('/kabupaten/') }}"
                $.ajax({
                    url: url + '/' + id,
                    method: 'GET',
                    success: function(response) {
                        $('.fg-kab').show();
                        $('#kabupaten').empty();

                        $.each(response.cities, function(index, value) {
                            $('#kabupaten').append(new Option(value.name, value.id))
                        })
                    }
                })
            });

            $('#kabupaten').on('change', function() {
                let id = $(this).val();
                let url = "{{ url('/kecamatan/') }}"
                $.ajax({
                    url: url + '/' + id,
                    method: 'GET',
                    success: function(response) {
                        $('.fg-kec').show();
                        $('#kecamatan').empty();
                        $.each(response.districts, function(index, value) {
                            $('#kecamatan').append(new Option(value.name, value.id))
                        })
                    }
                })
            });

        });


        function showStudy(id = '') {

            var url = "{{ url('/prodi') }}";

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
                            if(item.kouta == 0 || item.kouta > 1){
                                $('#study').append('<option class="study-item" value="' + item.id + '">' +
                                item.name + '</option>');

                            }else{

                                $('#study').append('<option class="study-item bg-red" value="" disabled>' +
                                item.name + ' | KOUTA PENUH </option>');
                            }
                          
                        });
                        $('#study').prepend('<option class="study-item " disabled selected> --- PILIH PROGRAM STUDI --- </option>');
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
                    <form method="POST" class="form-horizontal" action="{{ route('maba.store') }}" autocomplete="OFF">
                        @csrf
                        <hr>
                        <h4 class="text-bold text-lg">&nbsp; &nbsp;&nbsp;&nbsp;Data Diri Calon Mahasiswa</h4>
                        <hr>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Nama Lengkap</label>
                            <div class="col-sm-7">
                                <input type="text" name="nama_lengkap" class="form-control" value="">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Email</label>

                            <div class="col-sm-7">
                                <input type="text" name="email" class="form-control" value="{{ $isToken->email }}" readonly>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Tempat Lahir</label>

                            <div class="col-sm-6">
                                <input type="text" name="tempat_lahir" class="form-control" placeholder="cth: Marisa">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Tanggal Lahir</label>

                            <div class="col-sm-5">
                                <input type="text" name="tanggal_lahir" placeholder="1998-02-09" class="form-control date">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Jenis kelamin</label>

                            <div class="col-sm-5">
                                <select name="gender" class="form-control" id="">
                                    <option value="Laki-laki">Laki-laki</option>
                                    <option value="Perempuan">Perempuan</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Asal Sekolah</label>

                            <div class="col-sm-7">
                                <input type="text" name="asal_sekolah" class="form-control"
                                    placeholder="cth: SMA 1 POHUWATO">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Tahun Lulus</label>

                            <div class="col-sm-3">
                                <input type="number" name="tahun_lulus" class="form-control" placeholder="cth:2020">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Agama</label>

                            <div class="col-sm-5">
                                <select name="agama" class="form-control" id="">
                                    <option value="Islam">Islam</option>
                                    <option value="Katolik">Kristen Katolik</option>
                                    <option value="Protestan">Kristen Protestan</option>
                                    <option value="Hindu">Hindu</option>
                                    <option value="Budha">Budha</option>
                                    <option value="Konghucu">Konghucu</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Ukuran Baju</label>

                            <div class="col-sm-5">
                                <select name="ukuran_baju" class="form-control" id="">
                                    <option value="XXL">XXL</option>
                                    <option value="XL">XL</option>
                                    <option value="L">L</option>
                                    <option value="M">M</option>
                                    <option value="S">S</option>

                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Jurusan</label>

                            <div class="col-sm-5">
                                <select name="jurusan" class="form-control" id="">
                                    <option value="IPA">IPA</option>
                                    <option value="IPS">IPS</option>
                                    <option value="BAHASA">BAHASA</option>
                                    <option value="LAINNYA">LAINNYA</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Provinsi</label>
                            <div class="col-sm-5">
                                <select name="provinsi" id="province" class="form-control">
                                    <option value="">Pilih Provinsi </option>
                                    @foreach ($provinces as $id => $name)
                                        <option value="{{ $id }}">{{ $name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group fg-kab" style="display:none">
                            <label class="col-sm-3 control-label">Kabupaten / Kota</label>
                            <div class="col-sm-5">
                                <select name="kabupaten" id="kabupaten" class="form-control">
                                    <option value="">Pilih Kabupaten</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group fg-kec" style="display:none">
                            <label class="col-sm-3 control-label">Kecamatan / Kota</label>
                            <div class="col-sm-5">
                                <select name="kecamatan" id="kecamatan" class="form-control">
                                    <option value="">Pilih kecamatan</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-3 control-label">Alamat</label>

                            <div class="col-sm-7">
                                <input type="text" name="alamat" class="form-control" placeholder="cth Jl. Trans Sulawesi">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Telp/HP</label>

                            <div class="col-sm-5">
                                <input type="number" name="telepon" class="form-control" placeholder="cth: 082291281291">
                            </div>
                        </div>


                        <hr>
                        <h4 class="text-bold text-lg">&nbsp; &nbsp;&nbsp;&nbsp;Pilihan Pada Universitas Pohuwato</h4>
                        <hr>

                        <div class="form-group">
                            <label class="col-sm-3 control-label">pilihan kelas</label>

                            <div class="col-sm-7">
                                <select name="pilihan_kelas" class="form-control" id="">
                                    <option value="pagi" selected> Reguler Pagi</option>
                                    <option value="sore"> Reguler Sore</option>
                                </select>
                            </div>
                        </div>


                        <div class="form-group">
                            <label class="col-sm-3 control-label">Fakultas</label>

                            <div class="col-sm-7">
                                <select name="fakultas" class="form-control" id="faculty" required>
                                    <option value="" disabled> Pilih Fakultas</option>
                                    @foreach ($faculties as $faculty)
                                        <option value="{{ $faculty->id }}">{{ $faculty->name }}</option>
                                    @endforeach
                                </select>

                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-3 control-label">Program Studi</label>

                            <div class="col-sm-7">
                                <select name="prodi" class="form-control" id="study" disabled required>

                                </select>
                            </div>
                        </div>
                        <hr>

                        <div class="form-group">
                            <button class="btn btn-success btn-block btn-lg font-bold text-lg h1">SUBMIT FORMULIR</button>
                        </div>
                        <input type="hidden" value="{{ $isToken->token }}" name="token">
                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-2"></div>
    </section>

@endsection