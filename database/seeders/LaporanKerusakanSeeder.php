<?php

namespace Database\Seeders;

use App\Models\LaporanKerusakan;
use Illuminate\Database\Seeder;

class LaporanKerusakanSeeder extends Seeder
{
    public function run(): void
    {
        LaporanKerusakan::create([
            'fasilitas_id' => 1,
            'pelapor' => 'Budi',
            'judul_laporan' => 'Proyektor tidak menyala',
            'deskripsi_kerusakan' => 'Proyektor tidak dapat digunakan saat perkuliahan',
            'status' => 'Menunggu',
            'tanggal_lapor' => now(),
        ]);

        LaporanKerusakan::create([
            'fasilitas_id' => 2,
            'pelapor' => 'Siti',
            'judul_laporan' => 'Laci meja rusak',
            'deskripsi_kerusakan' => 'Laci tidak dapat ditutup dengan baik',
            'status' => 'Diproses',
            'tanggal_lapor' => now(),
        ]);

        LaporanKerusakan::create([
            'fasilitas_id' => 3,
            'pelapor' => 'Andi',
            'judul_laporan' => 'Koneksi internet lambat',
            'deskripsi_kerusakan' => 'Access Point sering terputus',
            'status' => 'Selesai',
            'tanggal_lapor' => now(),
        ]);
    }
}