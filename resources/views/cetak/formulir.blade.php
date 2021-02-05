<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        
        .info td {
            line-height: 30px
        }

        .under {
            line-height: 500px
        }

    </style>
</head>

<body>
    <table>
        <tr>
            <td><img width="100" src="http://unipo.ac.id/media/setting/logoone.png" alt=""></td>
            <td style="padding-left: 1rem">
                <h2><b>UNIVERSITAS POHUWATO</b></h2>
                <address>Lorem ipsum dolor sit amet consectetur adipisicing elit. </address>
                <span>HP. 098121212</span><br>
                <span>www.www.com</span>
            </td>
            <td width="30%" align="right">
                @php
                     $signature = $maba->biodata->no_registrasi;
                     
                     $qrqode = QrCode::generate($signature);
                     $qrqode = str_replace('<?xml version="1.0" encoding="UTF-8"?>', '', $qrqode );
                   
                @endphp
                {!! $qrqode!!}
               
            </td>
        </tr>

    </table>
    <hr style="margin-bottom: 1px">
    <hr style="margin-top: 0px">
  <h3 style="text-align: center; margin-top: 2px; margin-bottom: 0px">FORMULIR PENDAFTARAN MAHASISWA BARU</h3>
  <h4 style="text-align: center; margin-top: 2px; margin-bottom: 0px">{{ $maba->biodata->getprodi->name }}</h4>
  <h3 style="text-align: center; margin-top: 0px; margin-bottom: 0px">TAHUN AKADEMIK {{ $maba->token->angkatan }} / {{ $maba->token->angkatan+1 }}</h3>
  <h6 style="text-align: center; margin-top: 0px">NO REGISTRASI : <b>{{ $maba->biodata->no_registrasi }}</b></h6>
    <table class="info" style="margin-top: 30px" width="100%">
        <tr>
            <td width="35%" style="padding-left:3rem;">NO TOKEN</td>
            <td>: {{ $maba->token->token }}</td>
        </tr>
       
        <tr>
            <td width="30%" style="padding-left:3rem;">NAMA LENGKAP</td>
            <td>: {{ $maba->biodata->nama_lengkap }}</td>
        </tr>
        <tr>
            <td width="30%" style="padding-left:3rem;">EMAIL</td>
            <td>:  {{ $maba->token->email }}</td>
        </tr>
        <tr>
            <td width="30%" style="padding-left:3rem;">JENIS KELAMIN</td>
            <td>: {{ $maba->biodata->gender }}</td>
        </tr>
        <tr>
            <td width="30%" style="padding-left:3rem;">TEMPAT LAHIR</td>
            <td>: {{ $maba->biodata->tempat_lahir }}</td>
            <td width="40%"> TGL.LAHIR :  {{ $maba->biodata->tanggal_lahir }}</td>
        </tr>
        <tr>
            <td width="30%" style="padding-left:3rem;">AGAMA</td>
            <td>:  {{ $maba->biodata->agama }}</td>
        </tr>
        <tr>
            <td width="30%" style="padding-left:3rem;">ALAMAT</td>
            <td colspan="2">:  {{ $maba->biodata->alamat }}</td>
        </tr>
        <tr>
            <td width="30%" style="padding-left:3rem;">TELEPON/HP</td>
            <td>:  {{ $maba->biodata->tempat_lahir }}</td>
            <td width="40%"> UKURAN BAJU : {{  $maba->biodata->ukuran_baju }}</td>
        </tr>
        <tr>
            <td width="30%" style="padding-left:3rem;">ASAL SEKOLAH</td>
            <td  colspan="2">: {{ $maba->biodata->asal_sekolah }}</td>
        </tr>
        <tr>
            <td width="30%" style="padding-left:3rem;">JURUSAN</td>
            <td>: {{ $maba->biodata->jurusan }}</td>
        </tr>
        <tr>
            <td width="30%" style="padding-left:3rem;">PILIHAN KELAS</td>
            <td>: {{ $maba->biodata->pilihan_kelas == "sore" ? "SORE" : "PAGI" }}</td>
        </tr>
        <tr>
            <td width="30%" style="padding-left:3rem;">PILIHAN FAKULTAS</td>
            <td>: {{  $maba->biodata->getfakultas->name }}</td>
        </tr>
        <tr>
            <td width="30%" style="padding-left:3rem;">PROGRAM STUDI</td>
            <td>: {{  $maba->biodata->getprodi->name }}</td>
        </tr>
    </table>

    <hr style="margin-bottom: 1px">
    <hr style="margin-top: 0px">
    <table style="margin-top:30px" width="100%">
        <tr>
            <td width="30%" style="text-align: center"> <img width="120" height="170" style="border: 2px solid" src="{{ public_path($passphoto) }}" alt=""></td>
            <td></td>
            <td style="vertical-align: text-top; text-align:center;">
                <span >Pohuwato, {{ date('d-m-Y') }}</span><br>
                <p >Calon Mahasiswa/i,</p>
                <br><br><br><br><br><br><br>
                <hr style="vertical-align:text-bottom;" width="60%">
            </td>
        </tr>
    </table>
</body>

</html>
