<?php

namespace App\Http\Controllers;

use App\Models\KelasSiswa;
use App\Models\MataKuliah;
use App\Models\Penilaian;
use Illuminate\Http\Request;

class KelasSiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'kelas_id' => 'required'
        ]);

        KelasSiswa::create([
            'kelas_id' => $request->kelas_id,
            'user_id' => $request->user_id
        ]);

        return back()->with([
            "message" => [
                "label" => "Berhasil tambah kelas siswa ",
                "type" => "success",
            ],
        ]);;
    }

    /**
     * Display the specified resource.
     */
    public function show(KelasSiswa $kelassiswa)
    {
        $mataKuliah = MataKuliah::all();

        if ($kelassiswa->penilaian->count() == 0) {
            $rataRataNilai = 0;
        } else {
            $rataRataNilai = ($kelassiswa->penilaian->sum('nilai') / $kelassiswa->penilaian->count());
        }

        return inertia("Admin/Penilaian/ShowNilai", ["kelasSiswa" => $kelassiswa, "mataKuliah" => $mataKuliah, "rataRataNilai" => $rataRataNilai]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(KelasSiswa $kelasSiswa)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, KelasSiswa $kelasSiswa)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(KelasSiswa $kelassiswa)
    {
        //
        $kelassiswa->delete();
        return back();
    }
}
