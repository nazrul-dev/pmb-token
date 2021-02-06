<!DOCTYPE html>
<html>
<head>
    <style>
        .bg-password {
            margin-left: auto;
            margin-right: auto;
            text-align: center;
            background-color: #f3f3c8;
            padding: 10px;
            width: 30%;
            font-size: 20px;
            border: 1px solid #000;
            box-shadow: 5px 10px #424240;
        }
        .txt-pass {
            font-size: 30px;
        }
        .button {
            background-color: #4CAF50;
            border: none;
            padding: 15px 32px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 23px;
            margin: 4px 2px;
        }
    </style>
</head>
<body>
    <h4>
        <center>Terima Kasih Telah Melakukan Pendafataran Mahasiswa Baru Di Universitas Unipo </center>
    </h4>
    <h4>
        <center> Email Yang Digunakan: <br><b>{{ $token->email}}</b></center>
    </h4>
    <div class="box-password">
        <div class="bg-password"> PASSWORD <br>
            <hr> <span class="txt-pass">{{ $token->password }}</span>
        </div>
    </div>
    <p>
        <center>Silahkan Melakukan Login Di Panel Maba Agar Anda Bisa Melengkapi Berkas Yang Anda</center>
    </p>
    <center><a href="{{ url('/validation') }}" class="button"><span style="color: white">LINK PANEL MABA</span></a></center>
</body>
</html>
