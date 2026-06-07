<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Database\Seeders\KategoriFasilitasSeeder;
class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $this->call([
            KategoriFasilitasSeeder::class,
            UserSeeder::class,
            FasilitasSeeder::class,
            LaporanKerusakanSeeder::class,
        ]);
    }
}