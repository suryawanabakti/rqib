<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Role::create(["name" => "super"]); // super staff
        Role::create(["name" => "admin"]); // staff sekolah
        Role::create(["name" => "guru"]); // guru
        Role::create(["name" => "kepala"]); // guru
        Role::create(["name" => "user"]); // siswa
    }
}
