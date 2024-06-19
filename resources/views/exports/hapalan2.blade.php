<table>
    <tr>
        <td style="border: 1px solid black">Nama</td>
        <td style="border: 1px solid black" colspan="3">{{ $kelasSiswa->user->name }}</td>
    </tr>
    <tr>
        <td style="border: 1px solid black">NIS</td>
        <td style="border: 1px solid black" colspan="3">{{ $kelasSiswa->user->email }}</td>
    </tr>
    <tr>
        <td style="border: 1px solid black">Kelas</td>
        <td style="border: 1px solid black" colspan="3">{{ $kelasSiswa->kelas->name }}</td>
    </tr>
</table>

<table className="table card-table">
    <thead>
        <tr>
            <th width="200px"style="text-align: center; border: 1px solid black;">Pencapaian
            </th>
            <th width="150px" style="text-align: center; background-color: #ffffff; border: 1px solid black;">Jumlah
                Pencapaian</th>
            <th width="80px" style="text-align: center; border: 1px solid black;">Angka</th>
            <th width="80px" style="text-align: center; border: 1px solid black;">Predikat
            </th>
        </tr>
    </thead>
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
    <tbody>
        <tr>
            <td colspan="4" className="fw-bold" style="border: 1px solid black">
                Sabaq-Sabaqi (Hafalan Baru-Hafalan Kemarin)
            </td>
        </tr>
        @foreach ($sabaqsabaqi as $data)
            <tr key={{ $data->id }}>
                <td style="border: 1px solid black">{{ $data->pencapaian }}</td>
                <td style="border: 1px solid black">{{ $data->jumlah_pencapaian }}Halaman.</td>
                <td style="border: 1px solid black">{{ $data->nilai }}</td>
                <td style="border: 1px solid black">{{ cariPredikat($data->nilai) }}</td>
            </tr>
        @endforeach

        <tr>
            <td style="border: 1px solid black">Total</td>
            <td style="border: 1px solid black">{{ $sumSabaqsabaqi }}Halaman.</td>
            <td style="border: 1px solid black">{{ $rataSabaqsabaqi }}</td>
            <td style="border: 1px solid black">{{ cariPredikat($rataSabaqsabaqi) }}</td>
        </tr>
        <tr>
            <td colspan="4" className="fw-bold" style="border: 1px solid black">
                SIMA'AN (JUZ) :
            </td>
        </tr>
        @foreach ($simaan as $data)
            <tr key={{ $data->id }}>
                <td style="border: 1px solid black">{{ $data->pencapaian }}</td>
                <td style="border: 1px solid black">{{ $data->jumlah_pencapaian }}Halaman.</td>
                <td style="border: 1px solid black">{{ $data->nilai }}</td>
                <td style="border: 1px solid black">{{ cariPredikat($data->nilai) }}</td>

            </tr>
        @endforeach

        <tr>
            <td style="border: 1px solid black">Total</td>
            <td style="border: 1px solid black">{{ $sumSimaan }}Halaman.</td>
            <td style="border: 1px solid black">{{ $ratasimaan }}</td>
            <td style="border: 1px solid black">{{ cariPredikat($ratasimaan) }}</td>
        </tr>
        <tr>
            <td colspan="4" className="fw-bold" style="border: 1px solid black">
                IKHTIBAR SETIAP JUZ
            </td>
        </tr>
        @foreach ($ikhtibar as $data)
            <tr key={{ $data->id }}>
                <td style="border: 1px solid black">{{ $data->pencapaian }}</td>
                <td style="border: 1px solid black">{{ $data->jumlah_pencapaian }}Halaman.</td>
                <td style="border: 1px solid black">{{ $data->nilai }}</td>
                <td style="border: 1px solid black">{{ cariPredikat($data->nilai) }}</td>

            </tr>
        @endforeach

        <tr>
            <td style="border: 1px solid black">Total</td>
            <td style="border: 1px solid black">{{ $sumIkhtibar }}Halaman.</td>
            <td style="border: 1px solid black">{{ $rataikhtibar }}</td>
            <td style="border: 1px solid black">{{ cariPredikat($rataikhtibar) }}</td>
        </tr>
        @foreach ($ikhtibarBulanan as $data)
            <tr key={{ $data->id }}>
                <td className="fw-bold">
                    {{ $data->pencapaian }}
                </td>
                <td style="border: 1px solid black">{{ $data->jumlah_pencapaian }}Halaman.</td>
                <td style="border: 1px solid black">{{ $data->nilai }}</td>
                <td style="border: 1px solid black">{{ cariPredikat($data->nilai) }}</td>

            </tr>
        @endforeach
        @foreach ($ikhtibarSemester as $data)
            <tr key={{ $data->id }}>
                <td style="border: 1px solid black">{{ $data->pencapaian }}</td>
                <td style="border: 1px solid black">{{ $data->jumlah_pencapaian }}Halaman.</td>
                <td style="border: 1px solid black">{{ $data->nilai }}</td>
                <td style="border: 1px solid black">{{ cariPredikat($data->nilai) }}</td>

            </tr>
        @endforeach

        <tr>
            <td className="fw-bold" colspan="2">
                TOTAL NILAI TAHFIDZ
            </td>
            <td className="fw-bold" style="border: 1px solid black" colspan="2">{{ $rataNilaiTahfidz }}</td>
        </tr>
        <tr>
            <td className="fw-bold" style="border: 1px solid black" colspan="2">
                TOTAL HAFALAN KESELURUHAN
            </td>
            <td className="fw-bold" style="border: 1px solid black" colspan="2">{{ $totalHafalan }}Halaman.</td>
        </tr>
    </tbody>
</table>
<table>
    <tr>
        <td style="border: 1px solid black">Nama</td>
        <td style="border: 1px solid black" colspan="3">{{ $kelasSiswa->user->name }}</td>
    </tr>
    <tr>
        <td style="border: 1px solid black">NIS</td>
        <td style="border: 1px solid black" colspan="3">{{ $kelasSiswa->user->email }}</td>
    </tr>
    <tr>
        <td style="border: 1px solid black">Kelas</td>
        <td style="border: 1px solid black" colspan="3">{{ $kelasSiswa->kelas->name }}</td>
    </tr>
</table>

<table className="table card-table">
    <thead>
        <tr>
            <th width="200px"style="text-align: center; border: 1px solid black;">Pencapaian
            </th>
            <th width="150px" style="text-align: center; background-color: #ffffff; border: 1px solid black;">Jumlah
                Pencapaian</th>
            <th width="80px" style="text-align: center; border: 1px solid black;">Angka</th>
            <th width="80px" style="text-align: center; border: 1px solid black;">Predikat
            </th>
        </tr>
    </thead>
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
    <tbody>
        <tr>
            <td colspan="4" className="fw-bold" style="border: 1px solid black">
                Sabaq-Sabaqi (Hafalan Baru-Hafalan Kemarin)
            </td>
        </tr>
        @foreach ($sabaqsabaqi as $data)
            <tr key={{ $data->id }}>

                <td style="border: 1px solid black">{{ $data->pencapaian }}</td>
                <td style="border: 1px solid black">{{ $data->jumlah_pencapaian }}Halaman.</td>
                <td style="border: 1px solid black">{{ $data->nilai }}</td>
                <td style="border: 1px solid black">{{ cariPredikat($data->nilai) }}</td>
            </tr>
        @endforeach

        <tr>
            <td style="border: 1px solid black">Total</td>
            <td style="border: 1px solid black">{{ $sumSabaqsabaqi }}Halaman.</td>
            <td style="border: 1px solid black">{{ $rataSabaqsabaqi }}</td>
            <td style="border: 1px solid black">{{ cariPredikat($rataSabaqsabaqi) }}</td>
        </tr>
        <tr>
            <td colspan="4" className="fw-bold" style="border: 1px solid black">
                SIMA'AN (JUZ) :
            </td>
        </tr>
        @foreach ($simaan as $data)
            <tr key={{ $data->id }}>
                <td style="border: 1px solid black">{{ $data->pencapaian }}</td>
                <td style="border: 1px solid black">{{ $data->jumlah_pencapaian }}Halaman.</td>
                <td style="border: 1px solid black">{{ $data->nilai }}</td>
                <td style="border: 1px solid black">{{ cariPredikat($data->nilai) }}</td>

            </tr>
        @endforeach

        <tr>
            <td style="border: 1px solid black">Total</td>
            <td style="border: 1px solid black">{{ $sumSimaan }}Halaman.</td>
            <td style="border: 1px solid black">{{ $ratasimaan }}</td>
            <td style="border: 1px solid black">{{ cariPredikat($ratasimaan) }}</td>
        </tr>
        <tr>
            <td colspan="4" className="fw-bold" style="border: 1px solid black">
                IKHTIBAR SETIAP JUZ
            </td>
        </tr>
        @foreach ($ikhtibar as $data)
            <tr key={{ $data->id }}>
                <td style="border: 1px solid black">{{ $data->pencapaian }}</td>
                <td style="border: 1px solid black">{{ $data->jumlah_pencapaian }}Halaman.</td>
                <td style="border: 1px solid black">{{ $data->nilai }}</td>
                <td style="border: 1px solid black">{{ cariPredikat($data->nilai) }}</td>

            </tr>
        @endforeach

        <tr>
            <td style="border: 1px solid black">Total</td>
            <td style="border: 1px solid black">{{ $sumIkhtibar }}Halaman.</td>
            <td style="border: 1px solid black">{{ $rataikhtibar }}</td>
            <td style="border: 1px solid black">{{ cariPredikat($rataikhtibar) }}</td>
        </tr>
        @foreach ($ikhtibarBulanan as $data)
            <tr key={{ $data->id }}>
                <td className="fw-bold">
                    {{ $data->pencapaian }}
                </td>
                <td style="border: 1px solid black">{{ $data->jumlah_pencapaian }}Halaman.</td>
                <td style="border: 1px solid black">{{ $data->nilai }}</td>
                <td style="border: 1px solid black">{{ cariPredikat($data->nilai) }}</td>

            </tr>
        @endforeach
        @foreach ($ikhtibarSemester as $data)
            <tr key={{ $data->id }}>
                <td style="border: 1px solid black">{{ $data->pencapaian }}</td>
                <td style="border: 1px solid black">{{ $data->jumlah_pencapaian }}Halaman.</td>
                <td style="border: 1px solid black">{{ $data->nilai }}</td>
                <td style="border: 1px solid black">{{ cariPredikat($data->nilai) }}</td>

            </tr>
        @endforeach

        <tr>
            <td className="fw-bold" colspan="2">
                TOTAL NILAI TAHFIDZ
            </td>
            <td className="fw-bold" style="border: 1px solid black" colspan="2">{{ $rataNilaiTahfidz }}</td>
        </tr>
        <tr>
            <td className="fw-bold" style="border: 1px solid black" colspan="2">
                TOTAL HAFALAN KESELURUHAN
            </td>
            <td className="fw-bold" style="border: 1px solid black" colspan="2">{{ $totalHafalan }}Halaman.</td>
        </tr>
    </tbody>
</table>
