@php
    function cariPredikat($nilai)
    {
        if ($nilai > 90) {
            return 'A';
        } elseif ($nilai >= 70 && $nilai <= 94) {
            return 'A-';
        } else {
            return 'B';
        }
    }
@endphp

<table>
    <tr>
        <td colspan="9" style="text-align: center">
            <h1>LOGO</h1>
        </td>
    </tr>

    <tr>
        <td colspan="9" style="text-align: center; font-weight:bold;">
            <h1>RAPOR TAHFIDZ</h1>
        </td>
    </tr>

    <tr>
        <td colspan="9" style="text-align: center; font-weight:bold;">
            <h1>PESANTREN TAHFIDZUL QUR'AN RQIB</h1>
        </td>
    </tr>
    <tr>
        <td colspan="9">

        </td>
    </tr>
    {{-- ROW 6 --}}
    <tr>
        <td>Nama santri</td>
        <td></td>
        <td>: {{ $kelasSiswa->user->name }}</td>
        <td></td>
        <td></td>
        <td>Kelas/Semester</td>
        <td></td>
        <td>:{{ $kelasSiswa->kelas->name }}/1</td>
    </tr>
    {{-- ROW 7 --}}
    <tr>
        <td>Level</td>
        <td></td>
        <td>: 5 (Lima)</td>
        <td></td>
        <td></td>
        <td>Tahun Pelajaran</td>
        <td></td>
        <td>:2024</td>
    </tr>

    <tr>
        <td colspan="8"></td>
    </tr>

    <tr style="border: 1px solid black; text-align:center; font-weight:bold;">
        <td style="text-align: center;font-weight:bold">NO</td>
        <td colspan="3" style="text-align: center;font-weight:bold">PENCAPAIAN</td>
        <td style="text-align: center;font-weight:bold" width="200px">JUMLAH CAPAIAN (Hal/Juz)</td>
        <td style="text-align: center;font-weight:bold">KKM</td>
        <td style="text-align: center;font-weight:bold">ANGKA</td>
        <td style="text-align: center;font-weight:bold">PREDIKAT</td>
        <td style="text-align: center;font-weight:bold">KET</td>
    </tr>
    <tr>
        <td colspan="8" style="font-weight:bold">TAHFIDZ</td>
    </tr>

    {{-- ROW 12 --}}
    <tr>
        <td>1</td>
        <td colspan="7">Sabaq-Sabaqi (Hafalan Baru-Hafalan Kemarin)</td>
    </tr>
    {{-- ROW 13 --}}
    @foreach ($sabaqsabaqi as $data)
        <tr key={{ $data->id }}>
            <td></td>
            <td colspan="3">{{ $data->pencapaian }}</td>
            <td>{{ $data->jumlah_pencapaian }}Halaman.</td>
            <td>70</td>
            <td>{{ $data->nilai }}</td>
            <td>{{ cariPredikat($data->nilai) }}</td>
            <td></td>
        </tr>
    @endforeach
    <tr>
        <td colspan="4">TOTAL</td>
        <td>{{ $sumSabaqsabaqi }}Halaman.</td>
        <td>70</td>
        <td>{{ $rataSabaqsabaqi }}</td>
        <td>{{ cariPredikat($rataSabaqsabaqi) }}</td>
    </tr>

    {{-- SIMAAN --}}
    {{-- ROW 12 --}}
    <tr>
        <td>2</td>
        <td colspan="7">SIMA'AN (JUZ) :</td>
    </tr>
    {{-- ROW 13 --}}
    @foreach ($simaan as $data)
        <tr key={{ $data->id }}>
            <td></td>
            <td colspan="3">{{ $data->pencapaian }}</td>
            <td>{{ $data->jumlah_pencapaian }}Halaman.</td>
            <td>70</td>
            <td>{{ $data->nilai }}</td>
            <td>{{ cariPredikat($data->nilai) }}</td>
            <td></td>
        </tr>
    @endforeach
    <tr>
        <td colspan="4">TOTAL</td>
        <td>{{ $sumSabaqsabaqi }}Halaman.</td>
        <td>70</td>
        <td>{{ $rataSabaqsabaqi }}</td>
        <td>{{ cariPredikat($rataSabaqsabaqi) }}</td>
    </tr>

    {{-- IKHTIBAR SETIAP JUZ --}}
    {{-- SIMAAN --}}
    {{-- ROW 12 --}}
    <tr>
        <td>3</td>
        <td colspan="7">IKHTIBAR SETIAP JUZ :</td>
    </tr>
    {{-- ROW 13 --}}
    @foreach ($ikhtibar as $data)
        <tr key={{ $data->id }}>
            <td></td>
            <td colspan="3">{{ $data->pencapaian }}</td>
            <td>{{ $data->jumlah_pencapaian }}Halaman.</td>
            <td>70</td>
            <td>{{ $data->nilai }}</td>
            <td>{{ cariPredikat($data->nilai) }}</td>
            <td></td>
        </tr>
    @endforeach
    <tr>
        <td colspan="4">TOTAL</td>
        <td>{{ $sumIkhtibar }}Halaman.</td>
        <td>70</td>
        <td>{{ $rataikhtibar }}</td>
        <td>{{ cariPredikat($rataikhtibar) }}</td>
    </tr>

    <tr>
        <td>4</td>
        <td colspan="7">IKHTIBAR BULANAN</td>
    </tr>
    {{-- ROW  --}}
    @foreach ($ikhtibarBulanan as $data)
        <tr key={{ $data->id }}>
            <td></td>
            <td colspan="3">{{ $data->pencapaian }}</td>
            <td>{{ $data->jumlah_pencapaian }}Halaman.</td>
            <td>70</td>
            <td>{{ $data->nilai }}</td>
            <td>{{ cariPredikat($data->nilai) }}</td>
            <td></td>
        </tr>
    @endforeach
    <tr>
        <td>5</td>
        <td colspan="7">IKHTIBAR SEMESTER</td>
    </tr>
    {{-- ROW  --}}
    @foreach ($ikhtibarBulanan as $data)
        <tr key={{ $data->id }}>
            <td></td>
            <td colspan="3">{{ $data->pencapaian }}</td>
            <td>{{ $data->jumlah_pencapaian }}Halaman.</td>
            <td>70</td>
            <td>{{ $data->nilai }}</td>
            <td>{{ cariPredikat($data->nilai) }}</td>
            <td></td>
        </tr>
    @endforeach
    <tr>
        <th colspan="5">TOTAL NILAI TAHFIDZ</th>
        <td>70</td>
        <td>{{ $rataNilaiTahfidz }}</td>
        <td>{{ cariPredikat($rataNilaiTahfidz) }}</td>
        <td></td>
    </tr>
    <tr>
        <th colspan="4">TOTAL HAFALAN KESULURUHAN</th>
        <td colspan="5" style="text-align: center">{{ $totalHafalan }}Lembar.</td>
    </tr>


</table>
