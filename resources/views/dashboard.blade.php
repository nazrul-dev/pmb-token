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
    <!-- The time line -->
    <ul class="timeline">
        @for ($i = 0; $i < 100; $i++)
            <li class="time-label">
                <span class="bg-green">
                    10 Feb. 2014
                </span>
            </li>
            <!-- /.timeline-label -->
            <!-- timeline item -->
            <li>
                <i class="fa fa-bullhorn bg-red"></i>

                <div class="timeline-item">
                    <span class="time"><i class="fa fa-clock-o"></i> 12:05</span>

                    <h3 class="timeline-header"><a href="#">Support Team</a> sent you an email</h3>

                    <div class="timeline-body">
                        Etsy doostang zoodles disqus groupon greplin oooj voxy zoodles,
                        weebly ning heekya handango imeem plugg dopplr jibjab, movity
                        jajah plickers sifteo edmodo ifttt zimbra. Babblely odeo kaboodle
                        quora plaxo ideeli hulu weebly balihoo...
                    </div>
                    <div class="timeline-footer">
                        <a class="btn btn-primary btn-xs">Read more</a>
                        <a class="btn btn-danger btn-xs">Delete</a>
                    </div>
                </div>
            </li>
        @endfor
    </ul>
    @else
    <div class="callout callout-danger">
        <h4>PENDAFTARAN MASIH DI TUTUP </h4>
        <p>Pendaftaran Masih Ditutup Harap Menunggu .........</p>
        
      </div>
    @endif

    </section>
@endsection
