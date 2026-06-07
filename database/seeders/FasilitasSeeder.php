<?php

namespace Database\Seeders;

use App\Models\Fasilitas;
use Illuminate\Database\Seeder;

class FasilitasSeeder extends Seeder
{
    public function run(): void
    {
        Fasilitas::create([
            'kategori_fasilitas_id' => 1,
            'kode_fasilitas' => 'ELK001',
            'nama_fasilitas' => 'Proyektor Epson',
            'lokasi' => 'Lab Komputer 1',
            'kondisi' => 'Baik',
            'deskripsi' => 'Proyektor untuk kegiatan perkuliahan'
        ]);

        Fasilitas::create([
            'kategori_fasilitas_id' => 2,
            'kode_fasilitas' => 'MBL001',
            'nama_fasilitas' => 'Meja Dosen',
            'lokasi' => 'Ruang A101',
            'kondisi' => 'Rusak Ringan',
            'deskripsi' => 'Meja dosen dengan laci rusak'
        ]);

        Fasilitas::create([
            'kategori_fasilitas_id' => 3,
            'kode_fasilitas' => 'JRG001',
            'nama_fasilitas' => 'Access Point',
            'lokasi' => 'Gedung B',
            'kondisi' => 'Baik',
            'deskripsi' => 'Perangkat jaringan internet'
        ]);
    }
}