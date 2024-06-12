<table className="table card-table">
    <thead>
        <tr>
            <th>Pencapaian</th>
            <th>Jumlah Pencapaian</th>
            <th>Angka</th>
            <th>Predikat</th>
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
            <td colspan="4" className="fw-bold">
                Sabaq-Sabaqi (Hafalan Baru-Hafalan Kemarin)
            </td>
        </tr>
        @foreach ($sabaqsabaqi as $data)
            <tr key={{ $data->id }}>
                <td>{{ $data->pencapaian }}</td>
                <td>{{ $data->jumlah_pencapaian }}Halaman.</td>
                <td>{{ $data->nilai }}</td>
                <td>{{ cariPredikat($data->nilai) }}</td>

            </tr>
        @endforeach

        <tr>
            <td>Total</td>
            <td>{{ $sumSabaqsabaqi }}Halaman.</td>
            <td>{{ $rataSabaqsabaqi }}</td>
            <td>{{ cariPredikat($rataSabaqsabaqi) }}</td>
        </tr>
        <tr>
            <td colspan="4" className="fw-bold">
                SIMA'AN (JUZ) :
            </td>
        </tr>
        @foreach ($simaan as $data)
            <tr key={{ $data->id }}>
                <td>{{ $data->pencapaian }}</td>
                <td>{{ $data->jumlah_pencapaian }}Halaman.</td>
                <td>{{ $data->nilai }}</td>
                <td>{{ cariPredikat($data->nilai) }}</td>

            </tr>
        @endforeach

        <tr>
            <td>Total</td>
            <td>{{ $sumSimaan }}Halaman.</td>
            <td>{{ $ratasimaan }}</td>
            <td>{{ cariPredikat($ratasimaan) }}</td>
        </tr>
        <tr>
            <td colspan="4" className="fw-bold">
                IKHTIBAR SETIAP JUZ
            </td>
        </tr>
        @foreach ($ikhtibar as $data)
            <tr key={{ $data->id }}>
                <td>{{ $data->pencapaian }}</td>
                <td>{{ $data->jumlah_pencapaian }}Halaman.</td>
                <td>{{ $data->nilai }}</td>
                <td>{{ cariPredikat($data->nilai) }}</td>

            </tr>
        @endforeach

        <tr>
            <td>Total</td>
            <td>{{ $sumIkhtibar }}Halaman.</td>
            <td>{{ $rataikhtibar }}</td>
            <td>{{ cariPredikat($rataikhtibar) }}</td>
        </tr>
        @foreach ($ikhtibarBulanan as $data)
            <tr key={{ $data->id }}>
                <td className="fw-bold">
                    {{ $data->pencapaian }}
                </td>
                <td>{{ $data->jumlah_pencapaian }}Halaman.</td>
                <td>{{ $data->nilai }}</td>
                <td>{{ cariPredikat($data->nilai) }}</td>

            </tr>
        @endforeach
        @foreach ($ikhtibarSemester as $data)
            <tr key={{ $data->id }}>
                <td>{{ $data->pencapaian }}</td>
                <td>{{ $data->jumlah_pencapaian }}Halaman.</td>
                <td>{{ $data->nilai }}</td>
                <td>{{ cariPredikat($data->nilai) }}</td>

            </tr>
        @endforeach

        <tr>
            <td className="fw-bold" colspan="2">
                TOTAL NILAI TAHFIDZ
            </td>
            <td className="fw-bold">{{ $rataNilaiTahfidz }}</td>
        </tr>
        <tr>
            <td className="fw-bold" colspan="2">
                TOTAL HAFALAN KESELURUHAN
            </td>
            <td className="fw-bold">{{ $totalHafalan }}Halaman.</td>
        </tr>
    </tbody>
</table>
