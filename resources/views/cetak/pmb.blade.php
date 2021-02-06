<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        body {
            font-size: 9px
        }
        table {
            border-collapse: collapse;
            width: 100%;
        }
        table td,
        table th {
            border: 1px solid #333;
            padding: 5px;
        }
        table th {
            padding-top: 10px;
            padding-bottom: 10px;
            text-align: center;
        }
    </style>
</head>
<body>
    <table>
        <thead>
            <tr>
                <th>NAMA LENGKAP</th>
                <th>PERIODE</th>
                <th>FAKULTAS</th>
                <th>PROGRAM STUDI</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($results as $item)
                <tr>
                    <td>{{ $item->maba->biodata->nama_lengkap }}</td>
                    <td>{{ 'AGK-' . $item->angkatan . '/GEL-KE' . $item->gelombang }}</td>
                    <td>{{ $item->maba->biodata->getfakultas->name }}</td>
                    <td>{{ $item->maba->biodata->getprodi->name }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
