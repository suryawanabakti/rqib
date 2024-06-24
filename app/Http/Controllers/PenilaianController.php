<?php

namespace App\Http\Controllers;

use App\Exports\PenilaianExport;
use App\Http\Resources\Admin\UserResource;
use App\Models\Kelas;
use App\Models\KelasSiswa;
use App\Models\Penilaian;
use App\Models\User;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class PenilaianController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::role('user')->orderBy('updated_at', 'desc');
        if (request('search')) {
            $users->where('name', 'LIKE', '%' . request('search') . '%');
        }
        // return UserResource::collection($users);
        return inertia("Admin/Penilaian/Index", ["users" => UserResource::collection($users->paginate(8)), "search" => request('search')]);
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
        Penilaian::create([
            'kelas_siswa_id' => $request->kelas_siswa_id,
            'nilai' => $request->nilai,
            'mata_kuliah_id' => $request->matakuliah_id
        ]);
        return back();
    }

    /**
     * Display the specified resource.
     */
    public function show($penilaian)
    {
        $user = User::find($penilaian);
        $kelasSiswa = KelasSiswa::where('user_id', $penilaian)->get();
        $penilaian = Penilaian::where('user_id', $penilaian)->get();
        $kelas = Kelas::all();

        return inertia("Admin/Penilaian/Show", ["user" => $user, "penilaian" => $penilaian, "kelas" => $kelas, "kelasSiswa" => $kelasSiswa]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Penilaian $penilaian)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Penilaian $penilaian)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Penilaian $penilaian)
    {
        $penilaian->delete();
        return back();
    }

    public function cetak($id)
    {
        return Excel::download(new PenilaianExport($id), 'penilaian.xlsx');
        // return view('exports.penilaian', compact('user'));
    }
}
