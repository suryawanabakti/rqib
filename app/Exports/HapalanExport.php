<?php

namespace App\Exports;

use App\Models\KelasSiswa;
use App\Models\MataKuliah;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use App\Models\TahfidzIkhtibar;
use App\Models\TahfidzIkhtibarBulanan;
use App\Models\TahfidzIkhtibarSemester;
use App\Models\TahfidzSabaqSabaqi;
use App\Models\TahfidzSimaan;

class HapalanExport implements FromView
{
    public function __construct(public $kelassiswa)
    {
    }
    public function view(): View
    {
        $mataKuliah = MataKuliah::all();
        $kelassiswa = KelasSiswa::find($this->kelassiswa);

        $sabaqsabaqi =  TahfidzSabaqSabaqi::where('kelas_siswa_id', $kelassiswa->id)->get();
        $sumSabaqsabaqi = $sabaqsabaqi->sum('jumlah_pencapaian');
        $rataSabaqsabaqi = $sabaqsabaqi->sum('nilai') > 0 ? $sabaqsabaqi->sum('nilai') / $sabaqsabaqi->count() : 0;
        $simaan =  TahfidzSimaan::where('kelas_siswa_id', $kelassiswa->id)->get();
        $sumSimaan = $simaan->sum('jumlah_pencapaian');
        $ratasimaan = $simaan->sum('nilai') > 0 ? $simaan->sum('nilai') / $simaan->count() : 0;
        $ikhtibar =  TahfidzIkhtibar::where('kelas_siswa_id', $kelassiswa->id)->get();
        $sumIkhtibar = $ikhtibar->sum('jumlah_pencapaian');
        $rataikhtibar = $ikhtibar->sum('nilai') > 0 ? $ikhtibar->sum('nilai') / $ikhtibar->count() : 0;
        $ikhtibarBulanan =  TahfidzIkhtibarBulanan::where('kelas_siswa_id', $kelassiswa->id)->get();
        $sumIkhtibarBulanan = $ikhtibarBulanan->sum('jumlah_pencapaian');
        $rataikhtibarbulanan = $ikhtibarBulanan->sum('nilai') > 0 ? $ikhtibarBulanan->sum('nilai') / $ikhtibarBulanan->count() : 0;
        $ikhtibarSemester =  TahfidzIkhtibarSemester::where('kelas_siswa_id', $kelassiswa->id)->get();
        $sumIkhtibarSemester = $ikhtibarSemester->sum('jumlah_pencapaian');
        $rataikhtibarsemester = $ikhtibarSemester->sum('nilai') > 0 ? $ikhtibarSemester->sum('nilai') / $ikhtibarSemester->count() : 0;

        if ($kelassiswa->penilaian->count() == 0) {
            $rataRataNilai = 0;
        } else {
            $rataRataNilai = ($kelassiswa->penilaian->sum('nilai') / $kelassiswa->penilaian->count());
        }
        $rataNilaiTahfidz = ($rataSabaqsabaqi + $ratasimaan + $rataikhtibar + $rataikhtibarbulanan + $rataikhtibarsemester) / 5;
        $totalHafalan = $sumSabaqsabaqi + $sumSimaan + $sumIkhtibarBulanan + $sumIkhtibar + $sumIkhtibarSemester;
        return view(
            'exports.hapalan',
            [
                "kelasSiswa" => $kelassiswa,
                "mataKuliah" => $mataKuliah,
                "rataRataNilai" => $rataRataNilai,
                "sabaqsabaqi" => $sabaqsabaqi,
                'simaan' => $simaan,
                'ikhtibar' => $ikhtibar,
                'ikhtibarBulanan' => $ikhtibarBulanan, 'ikhtibarSemester' => $ikhtibarSemester, "sumSabaqsabaqi" => $sumSabaqsabaqi,
                "sumSimaan" => $sumSimaan,
                "sumIkhtibar" => $sumIkhtibar,
                "rataSabaqsabaqi" => $rataSabaqsabaqi,
                "ratasimaan" => $ratasimaan,
                "rataikhtibar" => $rataikhtibar,
                "rataNilaiTahfidz" => $rataNilaiTahfidz,
                "totalHafalan" => $totalHafalan
            ]
        );
    }
}
