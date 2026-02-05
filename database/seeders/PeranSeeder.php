<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Peran;
use Illuminate\Support\Str;

class PeranSeeder extends Seeder
{
    public function run(): void
    {
        Peran::insert([
            [
                'id' => Str::uuid(),
                'nama_peran' => 'Admin',
            ],
            [
                'id' => Str::uuid(),
                'nama_peran' => 'Petugas',
            ],
        ]);
    }
}
