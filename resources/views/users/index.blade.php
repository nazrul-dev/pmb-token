@extends('_layouts.back')
@section('extjs')

    <script>
        const url = "{{ route('back.users.update', '') }}";

        $(function() {

            $('#dataTables').DataTable();

            $('.gp').on('click', function() {
                let uuid = $(this).attr('data-uuid');
                $('#modal-gp').modal('show');
                $('#frmPassword').attr('action', url + '/' + uuid);

            })

            $('.ga').on('click', function() {
                let uuid = $(this).attr('data-uuid');
                let akses = $(this).attr('data-akses');
                $('#modal-ga').modal('show');
                $('#frmAkses').attr('action', url + '/' + uuid);
                $('#cur_akses').text(akses);
            })
        });

    </script>

@endsection
@section('content')
    <section class="content">
        <div class="row">
            <div class="col-md-2"></div>
            <div class="col-md-8">
                @if (Session::has('success'))
                    <div class="callout callout-success">
                        <h4><i class="fa fa-bullhorn"></i> &nbsp; Pesan Pemberitahuan</h4>
                        <p>{{ Session::get('success') }}</p>
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
                <div class="box">
                    <div class="box-header with-border">
                        <h4><b>&nbsp;&nbsp; DATA PENGGUNA</b></h4>
                        <button data-toggle="modal" data-target="#modal-add" class="btn btn-success pull-right">
                            + Tambah Pengguna
                        </button>
                    </div>
                    <div class="box-body">
                        <table id="dataTables" width="100%" class="table table-sm table-bordered yajra-datatable">
                            <thead>
                                <tr>
                                    <th>EMAIL</th>
                                    <th>AKSES</th>
                                    <th>UPDATE TERAKHIR</th>
                                    <th class="text-center">ACTION</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($users as $user)
                                    <tr>
                                        <td>{{ $user->email }}</td>
                                        <td>{{ $user->akses }}</td>
                                        <td>{{ $user->created_at->diffForHumans() }}</td>
                                        <td class="text-center">
                                            <button data-uuid="{{ $user->uuid }}" class="gp btn btn-danger btn-sm">Ganti
                                                password</button>
                                            <button data-uuid="{{ $user->uuid }}" data-akses="{{ $user->akses }}"
                                                class="ga btn btn-warning btn-sm">Ganti Akses</button>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="col-xs-2">

            </div>
        </div>
    </section>
    <div class="modal fade" id="modal-gp">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Ganti Password</h4>
                </div>
                <form action="" id="frmPassword" method="post">
                    @method('put')
                    @csrf
                    <div class="modal-body">
                        <label for="password"> Masukan Password Baru</label>
                        <input type="password" name="password" required class="form-control"
                            placeholder="Masukan Password Baru">
                    </div>
                    <div class="modal-footer">
                        <input type="hidden" name="tipe" value="password">
                        <button type="submit" class="btn btn-success">Simpan Perubahan</button>
                    </div>
                </form>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>

    <div class="modal fade" id="modal-ga">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title"><b>Ganti Akses</b></h4>
                </div>
                <form action="" id="frmAkses" method="post">
                    @method('patch')
                    @csrf
                    <div class="modal-body">
                        <p>Akses Sekarang <b id="cur_akses"></b></p>
                        <label for="akses">Ubah Akses Pengguna</label>
                        <select name="akses" class="form-control" id="akses" required>
                            <option value="" selected>-- pilih Akses --</option>
                            <option value="admin">Admin</option>
                            <option value="panitia">Panitia</option>
                            <option value="superadmin">Superadmin</option>

                        </select>
                    </div>
                    <div class="modal-footer">
                        <input type="hidden" name="tipe" value="akses">

                        <button type="submit" class="btn btn-success">Simpan Perubahan</button>
                    </div>
                </form>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>

    <div class="modal fade" id="modal-add">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title"><b>Tambah Pengguna</b></h4>
                </div>
                <form action="{{ route('back.users.store') }}" id="frmAkses" method="post">
                    @csrf
                    <div class="modal-body">

                        <div class="form-group">
                            <label for="akses">Email</label>
                            <input type="email" class="form-control" name="email" value="{{ old('email') }}">
                        </div>
                        <div class="form-group">
                            <label>{{ __('Password') }}</label>
                            <input id="password" type="password" class="form-control" name="password" required
                                autocomplete="new-password">
                        </div>
                        <div class="form-group ">
                            <label>Konfirmasi Password</label>
                            <input id="password-confirm" type="password" class="form-control" name="password_confirmation"
                                required autocomplete="new-password">
                        </div>
                        <div class="form-group">
                            <label for="akses">Pilih Akses Pengguna</label>
                            <select name="akses" class="form-control" required>
                                <option value="" selected>-- pilih Akses --</option>
                                <option value="admin">Admin</option>
                                <option value="panitia">Panitia</option>
                                <option value="superadmin">Superadmin</option>
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-success">Simpan</button>
                    </div>
                </form>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
@endsection
