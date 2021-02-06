@extends('_layouts.back')
@section('content')
    <section class="content">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Data Token</h3>
              </div>
            <div class="box-body">
                <table class="table table-bordered table-hover datatables">
                    <thead>
                        <tr>
                            <th class="no-sort" style="width: 10px">#</th>
                            <th>Nama </th>
                            <th>Email</th>
                            <th>Nomor Token</th>
                            <th>Periode</th>
                            <th>Status</th>
                            <th>Created</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $i = 1;
                        @endphp
                        @foreach ($tokens as $token)
                            <tr>
                                <td width="">{{ $i++ }}</td>
                                <td>{{ $token->email }}</td>
                                <td>{{ $token->token }}</td>
                                <td>GEL. {{ $token->gelombang }} / AGK.{{ $token->angkatan }}</td>
                                <td>{{ $token->use_token == 1 ? 'Terpakai' : 'Ready' }}</td>
                                <td>{{ $token->created_at->diffForHumans() }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </section>
@endsection
