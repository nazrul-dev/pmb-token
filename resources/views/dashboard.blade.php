@extends('_layouts.back')

@section('content')
<section class="content">
    @if ($status === true)
    <div class="row">
        <div class="col-md-3 col-sm-6 col-xs-12">
            <div class="info-box">
                <span class="info-box-icon  bg-green"><i class="fa fa-users"></i></span>

                <div class="info-box-content">
                    <span class="info-box-text">TOTAL PENDAFTAR</span>
                    <span class="info-box-number">{{ $maba }}<small> ORANG</small></span>
                </div>
                <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
        </div>
        <!-- /.col -->
        <div class="col-md-3 col-sm-6 col-xs-12">
            <div class="info-box">
                <span class="info-box-icon  bg-green"><i class="fa fa-graduation-cap"></i></span>

                <div class="info-box-content">
                    <span class="info-box-text">TOTAL PRODI</span>
                    <span class="info-box-number">{{ $prodi }}<small> PRODI</small></span>
                </div>
                <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
        </div>
        <!-- /.col -->

        <!-- fix for small devices only -->
        <div class="clearfix visible-sm-block"></div>

        <div class="col-md-3 col-sm-6 col-xs-12">
            <div class="info-box">
                <span class="info-box-icon bg-green"><i class="fa fa-ticket"></i></span>

                <div class="info-box-content">
                    <span class="info-box-text">TOKEN TERCETAK</span>
                    <span class="info-box-number">{{ $tokenall }}<small> TOKEN</small></span>
                </div>
                <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
        </div>
        <!-- /.col -->
        <div class="col-md-3 col-sm-6 col-xs-12">
            <div class="info-box">
                <span class="info-box-icon bg-red"><i class="fa fa-ticket"></i></span>

                <div class="info-box-content">
                    <span class="info-box-text">TOKEN TERPAKAI</span>
                    <span class="info-box-number">{{ $tokenused }}<small> TOKEN</small></span>
                </div>
                <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
        </div>
        <!-- /.col -->
    </div>
    @else
    <div class="callout callout-danger">
        <h4>PENDAFTARAN MASIH DI TUTUP </h4>
        <p>Pendaftaran Masih Ditutup Harap Menunggu .........</p>
        
      </div>
    @endif
    <!-- Chart's container -->
    <div id="chart" style="height: 300px;"></div>
    <!-- Charting library -->
    <script src="https://unpkg.com/echarts/dist/echarts.min.js"></script>
    <!-- Chartisan -->
    <script src="https://unpkg.com/@chartisan/echarts/dist/chartisan_echarts.js"></script>
    <!-- Your application script -->
    <script>
      const chart = new Chartisan({
        el: '#chart',
        url: "@chart('prodi_chart')",
      });
    </script>
    
 
    </section>
@endsection