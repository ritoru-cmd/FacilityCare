<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */

    public function run(): void
    {
        User::updateOrCreate(
            ['email' => 'admin@kampus.test'],
            [
                'name' => 'Administrator',
                'password' => Hash::make('password123'),
                'role' => 'admin',
            ]
        );

        User::updateOrCreate(
            ['email' => 'staff@kampus.test'],
            [
                'name' => 'Staff',
                'password' => Hash::make('password123'),
                'role' => 'staff',
            ]
        );
    }
}
