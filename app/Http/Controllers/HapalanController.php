<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class HapalanController extends Controller
{
    public function index(User $user)
    {
        return inertia("Admin/Penilaian/ShowHapalan", ["user" => $user]);
    }
}
