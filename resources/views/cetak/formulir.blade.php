<!DOCTYPE html>

<head>

    <title>Document</title>
    <style>
        .info td {
            line-height: 34px
        }

        .under {
            line-height: 70px
        }

        body{
            background-image: url('{{ $watermark }}');
            background-size: contain; /* Make background take entire page */
            background-position: center; /* Center Background */
            background-repeat: no-repeat;
            background-size: 80%;
          
        }

    </style>
</head>

<body>
   
    <table >
        <tr>
            <td width="30px"><img width="160" height="160" src="{{ $logo }}" alt=""></td>
            <td  style="padding-left: 1rem">
                <h2 style="margin-bottom: 0px"><b>UNIVERSITAS POHUWATO</b></h2>
                <address>Jln.Trans Sulawesi No.147, Desa Palopo, Kecamatan Marisa, Kabupaten Pohuwato</address>

                <span>https://www.unipo.ac.id</span>
            </td>
            <td width="30px">
                {{ $qrqode }}<img width="160" height="160" src="{{ $logo }}" alt="">
            </td>

        </tr>
    </table>
    <hr style="margin-bottom: 1px">
    <hr style="margin-top: 0px">
    <h3 style="text-align: center; margin-top: 2px; margin-bottom: 0px">FORMULIR PENDAFTARAN MAHASISWA BARU</h3>
    <h4 style="text-align: center; margin-top: 2px; margin-bottom: 0px">{{ $maba->biodata->getprodi->name }}</h4>
    <h3 style="text-align: center; margin-top: 0px; margin-bottom: 0px">TAHUN AKADEMIK {{ $maba->token->angkatan }} /
        {{ $maba->token->angkatan + 1 }}</h3>
    <h6 style="text-align: center; margin-top: 0px">NO REGISTRASI PENDAFTARAN :
        <b>{{ $maba->biodata->no_registrasi }}</b></h6>
    <table class="info" style="margin-top: 30px" width="100%">
        <tr>
            <td width="35%" style="padding-left:3rem;">NO TOKEN</td>
            <td>: <b>{{ Str::upper($maba->token->token) }}</b></td>
        </tr>
        <tr>
            <td width="25%" style="padding-left:3rem;">NAMA LENGKAP</td>
            <td>: {{ Str::upper($maba->biodata->nama_lengkap) }}</td>
        </tr>
        <tr>
            <td width="25%" style="padding-left:3rem;">EMAIL</td>
            <td>: {{ Str::upper($maba->token->email) }}</td>
        </tr>
        <tr>
            <td width="25%" style="padding-left:3rem;">JENIS KELAMIN</td>
            <td>: {{ Str::upper($maba->biodata->gender) }}</td>
        </tr>
        <tr>
            <td width="25%" style="padding-left:3rem;">TEMPAT LAHIR</td>
            <td>: {{ Str::upper($maba->biodata->tempat_lahir) }}</td>

        </tr>
        <tr>
            <td width="25%" style="padding-left:3rem;">TANGGAL LAHIR</td>
            <td>: {{ Str::upper($maba->biodata->tanggal_lahir) }}</td>

        </tr>
        <tr>
            <td width="25%" style="padding-left:3rem;">AGAMA</td>
            <td>: {{ Str::upper($maba->biodata->agama) }}</td>
        </tr>
        <tr>
            <td width="25%" style="padding-left:3rem;"> PROVINSI</td>
            <td> : {{ get_provinsi($maba->biodata->provinsi) }}</td>
        </tr>
        <tr>
            <td width="25%" style="padding-left:3rem;"> KABUPATEN/KOTA</td>
            <td> : {{ get_kabupaten($maba->biodata->kabupaten) }}</td>
        </tr>
        <tr>
            <td width="25%" style="padding-left:3rem;"> KECAMATAN</td>
            <td> : {{ get_kecamatan($maba->biodata->kecamatan) }}</td>
        </tr>
        <tr>
            <td width="25%" style="padding-left:3rem;">ALAMAT</td>
            <td>: {{ Str::upper($maba->biodata->alamat) }} </td>
        </tr>
        <tr>
            <td width="25%" style="padding-left:3rem;">TELEPON/HP</td>
            <td>: {{ $maba->biodata->telepon }}</td>

        </tr>
        <tr>
            <td width="25%" style="padding-left:3rem;">UKURAN BAJU</td>
            <td>: {{ $maba->biodata->ukuran_baju }}</td>

        </tr>
        <tr>
            <td width="25%" style="padding-left:3rem;">ASAL SEKOLAH</td>
            <td>: {{ Str::upper($maba->biodata->asal_sekolah) }}</td>
        </tr>
        <tr>
            <td width="25%" style="padding-left:3rem;">JURUSAN</td>
            <td>: {{ Str::upper($maba->biodata->jurusan) }}</td>
        </tr>
        <tr>
            <td width="5%" style="padding-left:3rem;">PILIHAN KELAS</td>
            <td>: REGULER {{ Str::upper($maba->biodata->pilihan_kelas == 'sore' ? 'SORE' : 'PAGI') }}</td>
        </tr>
        <tr>
            <td width="5%" style="padding-left:3rem;">PILIHAN FAKULTAS</td>
            <td>: {{ Str::upper($maba->biodata->getfakultas->name) }}</td>
        </tr>
        <tr>
            <td width="5%" style="padding-left:3rem;">PROGRAM STUDI</td>
            <td>: {{ Str::upper($maba->biodata->getprodi->name) }}</td>
        </tr>
    </table>
    <hr style="margin-bottom: 1px">
    <hr style="margin-top: 0px">
    <table style="margin-top:30px" width="100%">
        <tr>
            <td width="25%" style="text-align: center"> <img width="140" height="200" style="border: 2px solid"
                    src="{{ public_path($passphoto) }}" alt=""></td>

            <td colspan="2" style="vertical-align: text-top; text-align:center;">
                <span>Pohuwato, {{ date('d-m-Y') }}</span><br>
                <p>Calon Mahasiswa/i,</p>
                <br><br><br><br><br><br><br>
                <hr style="vertical-align:text-bottom;" width="40%">
                {{ Str::upper($maba->biodata->nama_lengkap) }}
            </td>
        </tr>
    </table>

</body>

</html>
