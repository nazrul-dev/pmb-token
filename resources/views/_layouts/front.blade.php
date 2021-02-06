<!DOCTYPE html>

<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>PMB UNIPO - SISTIM PENDAFTARAN MAHASISWA DENGAN VALIDASI TOKEN</title>

    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <link rel="stylesheet" href="{{ asset('AdminLTE2/bower_components/bootstrap/dist/css/bootstrap.min.css') }}">

    <link rel="stylesheet" href="{{ asset('AdminLTE2/bower_components/font-awesome/css/font-awesome.min.css') }}">
    
    <link rel="stylesheet" href="{{ asset('AdminLTE2/bower_components/Ionicons/css/ionicons.min.css') }}">
    <link rel="stylesheet"
        href="{{ asset('AdminLTE2/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css') }}">
 
    <link rel="stylesheet" href="{{ asset('AdminLTE2/dist/css/AdminLTE.min.css') }}">

    <link rel="stylesheet" href="{{ asset('AdminLTE2/dist/css/skins/skin-green.min.css') }}">

    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>

<body class="hold-transition skin-green   layout-top-nav">
    <div class="wrapper">
        <header class="main-header">
            <nav class="navbar navbar-static-top">
                <div class="container">
                    <div class="navbar-header">
                        <a href="{{ url('/') }}" class="navbar-brand"><b>PMB UNIPO</b></a>
                        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                            data-target="#navbar-collapse">
                            <i class="fa fa-bars"></i>
                        </button>
                    </div>
     
                    <div class="collapse navbar-collapse pull-left" id="navbar-collapse">
                        <ul class="nav navbar-nav">
                            <li><a href="{{ url('/') }}">BERANDA</a></li>
                            <li><a href="{{ route('validation') }}">PENDAFTARAN</a></li>
                            <li><a href="{{ route('validation') }}">CARA MENDAFTAR</a></li>
                            <li><a href="https://unipo.ac.id">INFO UNIVERSITAS</a></li>
                        </ul>
                    </div>
        
                    <div class="navbar-custom-menu">
                        <ul class="nav navbar-nav">
                      
                            <li>
                          
                                <a href="{{ route('login') }}" >
                                    <i class="fa fa-sign-in"></i> LOGIN
                                </a>
                            </li>
                        </ul>
                    </div>

                </div>
  
            </nav>
        </header>
 
        <div class="content-wrapper">
            <div class="container">
                @yield('content')
          
            </div>
  
        </div>
      
        <footer class="main-footer">
            <div class="container">
                <div class="pull-right hidden-xs">
                    <b>Version</b> BETA
                </div>
                @php
                    $year = date('Y');
                @endphp
                <strong>Copyright &copy; {{ $year.'-'.($year+1) }} <a href="https://github.com/labkoding-id">NAZRUL | LABKODING.ID</a>.</strong> All rights
                reserved.
            </div>
        </footer>
    </div>

    <script src="{{ asset('AdminLTE2/bower_components/jquery/dist/jquery.min.js') }}"></script>

    <script src="{{ asset('AdminLTE2/bower_components/bootstrap/dist/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('AdminLTE2/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js') }}">
    </script>
    <script src="{{ asset('AdminLTE2/dist/js/adminlte.min.js') }}"></script>
    @yield('extjs')
    <script>
        $('.date').datepicker({
            autoclose: true,
            format: 'yyyy-mm-dd',
        });
    </script>
</body>
</html>
