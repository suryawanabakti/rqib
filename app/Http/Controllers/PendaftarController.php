<?php

namespace App\Http\Controllers;

use App\Models\Pendaftar;
use App\Models\User;
use Illuminate\Http\Request;

class PendaftarController extends Controller
{
    public function index()
    {
        $pendaftar = Pendaftar::orderBy('created_at', 'desc')->paginate(10);
        return inertia("Admin/Pendaftar/Index", ["pendaftar" => $pendaftar]);
    }

    public function diterima(Pendaftar $pendaftar,  Request $request)
    {

        User::create([
            'name' => $pendaftar->name,
            'nik' => $pendaftar->nik,
            'dob' => $pendaftar->dob,
            'email' => $request->nis,
            'gender' => 'male',
            'password' => bcrypt($request->nis),
        ])->assignRole('user');
        $pendaftar->delete();
        return redirect(route("admin.users.index"))->with([
            "message" => [
                "label" => "Berhasil menerima siswa ",
                "type" => "success",
            ],
        ]);
    }
}
