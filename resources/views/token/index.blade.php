@extends('_layouts.back')

@section('extjs')
    <script>
        $(document).ready( function () {
    $('#table').DataTable();
} );
    </script>
@endsection
@section('content')
    <section class="content">
       <div class="row">
           <div class="col-xs-8 col-xs-offset-2">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Data Token</h3>
                </div>
                <div class="box-body">
                    <div class="table-responsive">
                        <table id="table" class="table table-bordered table-hover nowrap">
                            <thead>
                                <tr>
                                 
                                    <th>Email</th>
                                    <th>Nomor Token</th>
                                    <th>Periode</th>
                                    <th>Status</th>
                                    <th>Created</th>
                                </tr>
                            </thead>
                            <tbody>
                            
                                @foreach ($tokens as $token)
                                    <tr class="{{ $token->use_token == 1 ? 'bg-red ' : 'bg-green' }}">
        
                                        <td>{{ $token->email }}</td>
                                        <td><b>{{ $token->token }}</b></td>
                                        <td>GEL. {{ $token->gelombang }} / AGK.{{ $token->angkatan }}</td>
                                        <td><b>{{ $token->use_token == 1 ? 'TERPAKAI' : 'READY' }}</b></td>
                                        <td>{{ $token->created_at->diffForHumans() }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
           </div>
       </div>
    </section>
@endsection
