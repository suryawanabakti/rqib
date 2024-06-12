<?php

use App\Models\KelasSiswa;
use App\Models\User;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('tahfidz_sabaq_sabaqis', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(KelasSiswa::class);
            $table->string('pencapaian');
            $table->integer('jumlah_pencapaian');
            $table->integer('nilai');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tahfidz_sabaq_sabaqis');
    }
};
