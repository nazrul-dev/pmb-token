@extends('_layouts.back')
@section('content')
    <section class="content">
        <div class="row ">
            <div class="col-md-2">
                <div class="clearfix"></div>
            </div>
            <div class="col-md-8">
                @if (Session::has('success'))
                    <div class="callout callout-success">
                        <h5><i class="fa fa-bullhorn"></i> &nbsp;{{ Session::get('success') }}</h5>
                    </div>
                @endif
                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title text-bold">{{ $title }}</h3>
                        <div class="text-right">
                            <a href="{{ $route }}"class="btn btn-sm btn-success"> Tambah {{ $title }}</a>
                        </div>
                    </div>
                    <div class="box-body">
                        <table class="table table-bordered">
                            <tbody>
                                <tr>
                                    <th style="width: 10px">#</th>
                                    <th>Nama {{ $title }}</th>
                                    <th>Fakultas</th>
                                    <th>Created</th>
                                    <th class="text-center" style="width: 150px">Action</th>
                                </tr>
                                @php
                                $i = 1;
                                @endphp
                                @foreach ($data as $item)
                                    <tr>
                                        <td>{{ $i++ }}.</td>
                                        <td>{{ $item->name }}</td>
                                        <td>{{ $item->faculty->name }}</td>
                                        <td>{{ $item->created_at }}</td>
                                        <td class="text-center">
                                            <a href="{{ route('back.study.edit', $item->id) }}"
                                                class="btn btn-warning btn-xs">Edit</a>
                                            <button class="btn btn-danger btn-xs">Hapus</button>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="box-footer clearfix">
                        {{ $data->links() }}
                    </div>
                </div>
            </div>
            <div class="col-md-2">
                <div class="clearfix"></div>
            </div>
        </div>
    </section>
@endsection
