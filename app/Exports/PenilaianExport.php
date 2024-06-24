<?php

namespace App\Exports;

use App\Models\KelasSiswa;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromView;

class PenilaianExport implements FromView
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function __construct(public $kelasSiswa)
    {
    }

    public function view(): View
    {
        $kelasSiswa = KelasSiswa::where('id', $this->kelasSiswa)->with('penilaian')->first();
        return view('exports.penilaian', compact('kelasSiswa'));
    }
}
