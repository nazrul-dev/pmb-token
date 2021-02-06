@extends('_layouts.back')
@section('extjs')
    <script type="text/javascript">
        $(function() {
            var table = $('.yajra-datatable').DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{ url('api/maba/archive') }}",
                columns: [
                    {
                        data: 'biodata.nama_lengkap',
                        name: 'biodata.nama_lengkap',
                        orderable: false,
                    },
                    {
                        data: 'periode',
                        class: 'text-center text-bold',
                        name: 'periode',
                        orderable: false,
                    },
                    {
                        data: 'biodata.getfakultas.name',
                        name: 'biodata.getfakultas.name',
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
        });
    </script>
@endsection
@section('content')
    <section class="content">
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
