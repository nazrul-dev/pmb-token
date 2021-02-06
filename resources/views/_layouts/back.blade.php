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

<body class="hold-transition skin-green sidebar-mini sidebar-collapse">
    <div class="wrapper">

        <header class="main-header">

            <a href="index2.html" class="logo">

                <span class="logo-mini"><b>A</b>LT</span>

                <span class="logo-lg"><b>PMB | TOKEN
                    </b></span>
            </a>

            <nav class="navbar navbar-static-top" role="navigation">

                <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
                    <span class="sr-only">Toggle navigation</span>
                </a>

                <div class="navbar-custom-menu">
                    <ul class="nav navbar-nav">

                        <li class="dropdown notifications-menu">

                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <i class="fa fa-bell-o"></i>
                                <span class="label label-warning">10</span>
                            </a>
                            <ul class="dropdown-menu">
                                <li class="header">You have 10 notifications</li>
                                <li>

                                    <ul class="menu">
                                        <li>

                                            <a href="#">
                                                <i class="fa fa-users text-aqua"></i> 5 new members joined today
                                            </a>
                                        </li>

                                    </ul>
                                </li>
                                <li class="footer"><a href="#">View all</a></li>
                            </ul>
                        </li>
                        <li class="dropdown user user-menu">

                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <i class="fa fa-key"></i>
                            </a>
                            <ul class="dropdown-menu">

                                <li class="user-header">
                                    <img src="https://www.americanaircraftsales.com/wp-content/uploads/2016/09/no-profile-img.jpg"
                                        class="img-circle" alt="User Image">
                                    <p>
                                        {{ auth()->user()->name }} - {{ auth()->user()->type }}
                                        <small>Terdaftar {{ auth()->user()->created_at->diffForHumans() }}</small>
                                    </p>
                                </li>
                                <li class="user-footer">
                                    <div class="pull-left">
                                        <a href="#" class="btn btn-success btn-flat">Ganti Password</a>
                                    </div>
                                    <div class="pull-right">
                                        <form method="POST" action="{{ route('logout') }}">
                                            @csrf
                                            <button type="submit" class="btn btn-danger btn-flat">Sign out</button>
                                        </form>
                                    </div>
                                </li>
                            </ul>
                        </li>

                    </ul>
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

        <footer class="main-footer">

            <div class="pull-right hidden-xs">
                Anything you want
            </div>

            <strong>Copyright &copy; 2016 <a href="#">Company</a>.</strong> All rights reserved.
        </footer>
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
    <script src="{{ asset('js/instascan/scan.min.js') }}"></script>
    @yield('extjs')
    <script>
        $('.date').datepicker({
            autoclose: true
        });
        $('.datatables').DataTable({
            'paging': true,
            'lengthChange': false,
            'searching': true,
            'ordering': false,
            'info': true,
            'autoWidth': false,
            "columnDefs": [{
                "targets": 0,
                "orderable": false
            }]
        })

    </script>
    @stack('scripts')

</body>

</html>
