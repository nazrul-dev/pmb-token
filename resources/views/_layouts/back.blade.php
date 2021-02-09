<!DOCTYPE html>

<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>PANEL PMB | {{ Str::ucfirst(auth()->user()->akses) }}</title>
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
 
    <link rel="stylesheet" href="{{ asset('AdminLTE2/bower_components/bootstrap/dist/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('AdminLTE2/bower_components/font-awesome/css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('AdminLTE2/bower_components/Ionicons/css/ionicons.min.css') }}">
    <link href="{{ asset('js/lightbox/dist/css/lightbox.css') }}" rel="stylesheet" />
    <link rel="stylesheet"
        href="{{ asset('AdminLTE2/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css') }}">
    <link rel="stylesheet"
        href="{{ asset('AdminLTE2/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('AdminLTE2/dist/css/AdminLTE.min.css') }}">
    <link rel="stylesheet" href="{{ asset('AdminLTE2/dist/css/skins/skin-green.min.css') }}">
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
    

</head>

<body id="body" class="hold-transition skin-green sidebar-mini sidebar-collapse" data-view="@mobile
@endmobile">
    
    <div class="wrapper">

        <header class="main-header">

            <a href="{{ url('back') }}" class="logo">

                <span class="logo-mini"><b>PMB</b></span>

                <span class="logo-lg"><b>PMB | TOKEN
                    </b></span>
            </a>

            <nav class="navbar navbar-static-top" role="navigation">

                <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
                    <span class="sr-only">Toggle navigation</span>
                </a>
                <div class="pull-right">
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" style="margin-top:7px; margin-right:50px; background-color:#305f49"
                            class="btn btn-danger">KELUAR AKUN</button>
                    </form>
                </div>

            </nav>
        </header>

        <aside class="main-sidebar">

            @include('_partials.back.menu')

        </aside>

        <div class="content-wrapper">

            <section class="content container-fluid">
                @yield('content')
            </section>

        </div>


    </div>
    <div class="modal fade" id="modal-cetak">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-body">
                    <form class="form-horizontal" action="{{ route('back.pmb.cetak') }}" method="post">
                        @csrf
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Angkatan</label>
                            <div class="col-sm-7">
                                <select name="angkatan" class="form-control" id="">
                                    <option value="excel">PILIH ANGKATAN</option>
                                    <option value="all">SEMUA ANGKTAN</option>
                                    <option value="2021">2021</option>
                                    <option value="2020">2022</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Gelombang</label>
                            <div class="col-sm-7">
                                <select name="gelombang" class="form-control" id="">
                                    <option value="excel">PILIH GELOMBANG</option>
                                    <option value="all">SEMUA GELOMBANG</option>
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Fakultas</label>
                            <div class="col-sm-7">
                                <select name="fakultas" class="form-control" id="">
                                    <option value="all">SEMUA FAKULTAS</option>
                                    <option value="json">JSON</option>
                                    <option value="pdf">PDF</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Prodi</label>
                            <div class="col-sm-7">
                                <select name="prodi" class="form-control" id="">
                                    <option value="all">SEMUA PRODI</option>
                                    <option value="json">JSON</option>
                                    <option value="pdf">PDF</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Format Cetak</label>
                            <div class="col-sm-7">
                                <select name="format" class="form-control" id="">
                                    <option value="json">EXCEL</option>
                                    <option value="pdf">PDF</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group ">
                            <div class="col-sm-12 text-right">
                                <button type="submit" class="btn btn-success">CETAK / DOWNLOAD</button>
                            </div>
                        </div>
                    </form>
                </div>

            </div>

        </div>
    </div>
    
    <script src="{{ asset('AdminLTE2/bower_components/jquery/dist/jquery.min.js') }}"></script>

    <script src="{{ asset('AdminLTE2/bower_components/bootstrap/dist/js/bootstrap.min.js') }}"></script>

    <script src="{{ asset('AdminLTE2/bower_components/datatables.net/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('AdminLTE2/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js') }}">
    </script>
    <script src="{{ asset('AdminLTE2/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js') }}">
    </script>
    <script src="{{ asset('js/lightbox/dist/js/lightbox.js') }}"></script>
    <script src="{{ asset('AdminLTE2/dist/js/adminlte.min.js') }}"></script>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <script>
      
    </script>
    @yield('extjs')
  
    @stack('scripts')

</body>

</html>
