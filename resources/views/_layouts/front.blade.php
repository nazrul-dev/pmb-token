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
                            <li class="{{ request()->is('/') ? 'active' : '' }}"><a
                                    href="{{ url('/') }}">BERANDA</a></li>
                            <li class="{{ request()->is('validation*') ? 'active' : '' }}"><a
                                    href="{{ route('validation') }}">PENDAFTARAN</a></li>
                            <li class=""><a href="{{ asset('pmbunipo-beta.apk') }}">DOWNLOAD VERSI ANDROID</a></li>
                            {{-- <li><a href="{{ route('validation') }}">CARA MENDAFTAR</a></li> --}}
                            <li><a href="https://unipo.ac.id">INFO UNIVERSITAS</a></li>
                        </ul>
                    </div>

                    <div class="navbar-custom-menu">
                        <ul class="nav navbar-nav">

                            <li>
                                @auth
                                    <a href="{{ route('back.dashboard') }}">
                                        <i class="fa fa-sign-in"></i> PANEL
                                    </a>
                                @else
                                    <a href="{{ route('login') }}">
                                        <i class="fa fa-sign-in"></i> LOGIN
                                    </a>
                                @endauth

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

        {{-- @include('scan') --}}
        <footer class="main-footer">
            <div class="container">
                <div class="pull-right hidden-xs">
                    <b>Version</b> BETA
                </div>
                @php
                    $year = date('Y');
                @endphp
                <strong>Copyright &copy; {{ $year . '-' . ($year + 1) }} <a
                        href="https://github.com/labkoding-id">NAZRUL |
                        LABKODING.ID</a>.</strong> All rights
                reserved.
            </div>
        </footer>
    </div>

    <script src="{{ asset('AdminLTE2/bower_components/jquery/dist/jquery.min.js') }}"></script>

    <script src="{{ asset('AdminLTE2/bower_components/bootstrap/dist/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('AdminLTE2/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js') }}">
    </script>
    <script src="{{ asset('AdminLTE2/dist/js/adminlte.min.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.min.js"
        integrity="sha512-d9xgZrVZpmmQlfonhQUvTR7lMPtO7NkZMkA0ABN3PHCbKA5nqylQ/yWlFAyY6hYgdF1Qh6nYiuADWwKB4C2WSw=="
        crossorigin="anonymous"></script>
    <script type="text/javascript" src="{{ asset('js/instascan.min.js') }}"></script>
    <!--Start of Tawk.to Script-->
    <!--Start of Tawk.to Script-->
    <!--Start of Tawk.to Script-->
    <script type="text/javascript">
        $(function() {
            $('#tawkchat-chat-bubble-close').filter(
                    ":has(img[src*='https://static-v.tawk.to/a-v3/images/bubbles/168-r-br.svg'])")
                .find("div[style*='display: none']").remove()
        });
        var Tawk_API = Tawk_API || {},
            Tawk_LoadStart = new Date();
        (function() {

            var s1 = document.createElement("script"),
                s0 = document.getElementsByTagName("script")[0];
            s1.async = true;
            s1.src = 'https://embed.tawk.to/601fea4ea9a34e36b974a6ff/1etuc1gq0';
            s1.charset = 'UTF-8';
            s1.setAttribute('crossorigin', '*');
            s0.parentNode.insertBefore(s1, s0);
        })();

    </script>
    <!--End of Tawk.to Script-->
    <!--End of Tawk.to Script-->
    <!--End of Tawk.to Script-->
    {{-- <script>
        
        var DataProdi = [];
        var JumlahMaba = [];
        $.ajax({
            url: "{{ url('api/biodata') }}",
            method: 'GET',
            success: function(res){
                $.each(res, function(index, value) {
                    DataProdi.push(value.nama_prodi);
                    JumlahMaba.push(value.jumlah_maba);
                })
                
                console.log(DataProdi);

                var ctx = document.getElementById('myChart').getContext('2d');
                var myChart = new Chart(ctx, {
                    
                    type: 'bar',
                    type: 'horizontalBar',
                    data: {
                        labels: DataProdi,
                        datasets: [{
                            label: 'Jumlah Mahasiswa Baru',
                            data: JumlahMaba,
                        }
                      ]
                    },
                    options: {
                        scales: {
                            yAxes: [{
                                ticks: {
                                    beginAtZero: true
                                }
                            }]
                        }
                    }
                });
            },
        })


        
        
        </script> --}}
    @yield('extjs')
    <script>
        $('.date').datepicker({
            autoclose: true,
            format: 'yyyy-mm-dd',
        });

    </script>
    {{-- <script>
        let url = "{{ url('api/found/') }}";
        let scanner = new Instascan.Scanner({
            video: document.getElementById("camera"),
            mirror: false,
        });

        let resultado = document.getElementById("qrcode");
        scanner.addListener("scan", function(content) {
            resultado.innerText = content;

            found(content);
            scanner.stop();
        });
        Instascan.Camera.getCameras()
            .then(function(cameras) {
                if (cameras.length > 0) {
                    var selectedCam = cameras[0];
                    $.each(cameras, (i, c) => {
                        if (c.name.indexOf('back') != -1) {
                            selectedCam = c;
                            return false;
                        }
                    });

                    scanner.start(selectedCam);
                } else {
                    resultado.innerText = "No cameras found.";
                }
            })
            .catch(function(e) {
                resultado.innerText = e;
            });

        function found(qrqode) {
            $.ajax({
                url: url + '/' + qrqode,
                method: 'GET',
                type: 'JSON',
                success: function(data) {
                    $('#modal-scan').modal('show');
                   
            
                    $('#nama').text(data.nama_lengkap);
                    $('#token').text(data.maba.token.token);
                    $('#no').text(data.no_registrasi);
                    $('#jurusan').text(data.getprodi.name);
                    $('#foto').attr('src', 'media/berkas/'+data.passphoto);
                      
                   
                }
            });
        }

    </script> --}}
</body>

</html>
