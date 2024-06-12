<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $user->name }}</title>
    <style>
        #customers {
            font-family: Arial, Helvetica, sans-serif;
            border-collapse: collapse;
            width: 100%;
        }

        #customers td,
        #customers th {
            border: 1px solid #ddd;
            padding: 8px;
        }

        #customers tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        #customers tr:hover {
            background-color: #ddd;
        }

        #customers th {
            padding-top: 12px;
            padding-bottom: 12px;
            text-align: left;
            background-color: #04AA6D;
            color: white;
        }
    </style>
</head>

<body>
    <table>
        <thead>
            <tr>
                <th style="text-align: left">Nama</th>
                <th style="text-align: left">{{ $user->name }}</th>
            </tr>
            <tr>
                <th style="text-align: left">NIS</th>
                <th style="text-align: left">{{ $user->email }}</th>
            </tr>
        </thead>

    </table>
    @foreach ($user->kelasSiswa as $kelas)
        <h4>Kelas : {{ $kelas->kelas->name }}</h4>
        <table id="customers">
            <thead>
                @foreach ($kelas->penilaian as $penilaian)
                    <tr>
                        <td>{{ $penilaian->matakuliah?->matakuliah }}</td>
                        <td>{{ $penilaian->nilai }}</td>
                    </tr>
                @endforeach
            </thead>
        </table>
    @endforeach
</body>

</html>
