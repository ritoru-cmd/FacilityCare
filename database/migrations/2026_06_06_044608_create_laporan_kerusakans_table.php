<?php

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
        Schema::create('laporan_kerusakan', function (Blueprint $table) {
            $table->id();

            $table->foreignId('fasilitas_id')
            ->constrained('fasilitas')
            ->cascadeOnDelete();

            $table->string('pelapor');

            $table->string('judul_laporan');

            $table->text('deskripsi_kerusakan');

            $table->string('foto')->nullable();

            $table->enum('status', [
                'Menunggu',
                'Diproses',
                'Selesai'
            ])->default('Menunggu');

            $table->date('tanggal_lapor');

            $table->softDeletes();
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('laporan_kerusakan');
    }
};
