<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KelasSiswa extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    public $with = ['kelas', 'user', 'penilaian', 'sabaqsabaqi'];

    public  function sabaqsabaqi()
    {
        return $this->belongsTo(TahfidzSabaqSabaqi::class, 'kelas_siswa_id', 'id');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function kelas()
    {
        return $this->belongsTo(Kelas::class, 'kelas_id', 'id');
    }

    public function penilaian()
    {
        return  $this->hasMany(Penilaian::class);
    }
}
