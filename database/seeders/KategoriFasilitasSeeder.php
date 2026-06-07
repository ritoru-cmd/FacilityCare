<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\KategoriFasilitas;

class KategoriFasilitasSeeder extends Seeder
{
    public function run(): void
    {
        $data = [
            [
                'nama_kategori' => 'Elektronik',
                'deskripsi' => 'Peralatan elektronik kampus',
            ],
            [
                'nama_kategori' => 'Meubel',
                'deskripsi' => 'Meja, kursi, lemari',
            ],
            [
                'nama_kategori' => 'Jaringan',
                'deskripsi' => 'Perangkat jaringan komputer',
            ],
            [
                'nama_kategori' => 'Ruangan',
                'deskripsi' => 'Fasilitas ruangan kampus',
            ],
        ];

        foreach ($data as $kategori) {
            KategoriFasilitas::create($kategori);
        }
    }
}