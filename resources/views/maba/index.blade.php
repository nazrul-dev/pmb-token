@extends('_layouts.back')
@section('extjs')
    <script type="text/javascript">
        $(function() {
            var table = $('.yajra-datatable').DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{ url('api/maba') }}",
                columns: [{
                        data: 'biodata.nama_lengkap',
                        name: 'biodata.nama_lengkap'
                    },
                    {
                        data: 'biodata.no_registrasi',
                        name: 'biodata.no_registrasi'
                    },
                    {
                        data: 'biodata.getfakultas.name',
                        name: 'biodata.getfakultas.name'
                    },
                    {
                        data: 'biodata.getprodi.name',
                        name: 'biodata.getprodi.name'
                    },
                    {
                        data: 'action',
                        class: 'text-center',
                        name: 'action',
                        orderable: false,
                        searchable: false
                    },
                ]
            });

            $('.yajra-datatable ').on('click', '.reset', function(e) {
                e.preventDefault();
                var urlToRedirect = e.currentTarget.getAttribute('href');
                Swal.fire({
                    title: '<h5>Apakah Ingin Mereset Password?</h5>',
                    text: "Reset Password Akan Mengembalikan Password Ke Password Yang Pertama Saat maba Melakukan Pendaftaran ",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Ya, Saya Ingin Reset!',
                    cancelButtonText: 'Tidak'
                }).then((result) => {
                    if (result.isConfirmed) {
                        window.location.href = urlToRedirect;
                    }
                });
            });
        });

    </script>
@endsection
@section('content')
    <section class="content">
        @if (Session::has('success'))
            <div class="callout callout-success">
                <h4><i class="fa fa-bullhorn"></i> &nbsp;{{ Session::get('success') }}</h4>
            </div>
        @endif
        <div class="box">
            <div class="box-body">
                <table width="100%" class="table table-sm table-bordered yajra-datatable">
                    <thead>
                        <tr>
                            <th>NAMA LENGKAP</th>
                            <th>NO.REGISTRASI</th>
                            <th>FAKULTAS</th>
                            <th>PRODI</th>
                            <th>ACTION</th>
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
            </div>
        </div>
    </section>
@endsection
