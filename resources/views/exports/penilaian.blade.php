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

    <tr>
        <td rowspan="4" style="text-align:center;" width="20px">No</td>
        <td rowspan="4" style="text-align:center">Mata Pelajaran</td>
        <td rowspan="4" style="text-align:center">KKM</td>
        <td colspan="6" style="text-align: center">Nilai Hasil Belajar</td>
    </tr>
    <tr>
        <td colspan="2" style="text-align:center">Pengetahuan</td>
        <td colspan="2" style="text-align:center">Keterampilan</td>
        <td colspan="2" style="text-align:center">Sikap</td>
    </tr>
    <tr>
        <td rowspan="2">Angka</td>
        <td rowspan="2">Huruf</td>
        <td rowspan="2">Angka</td>
        <td rowspan="2">Huruf</td>
        <td colspan="2" style="text-align:center">Predikat</td>
    </tr>
    <tr>
        <td>Spritual</td>
        <td>Sosial</td>
    </tr>
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

    <tr>
        <td colspan="9">Kelompok A</td>
    </tr>
    @foreach ($kelasSiswa->penilaian as $penilaian)
        <tr>
            <td></td>
            <td>{{ $penilaian->matakuliah->matakuliah }}</td>
            <td>70</td>
            <td>{{ $penilaian->nilai }}</td>
            <td>{{ cariPredikat($penilaian->nilai) }}</td>
            <td>80</td>
            <td>80</td>
            <td>85</td>
            <td>85</td>
        </tr>
    @endforeach

</table>
