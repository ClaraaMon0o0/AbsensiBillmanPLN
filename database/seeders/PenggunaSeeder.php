<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Peran;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class PenggunaSeeder extends Seeder
{
    public function run(): void
    {
        $admin = Peran::where('nama_peran', 'Admin')->first();

        Pengguna::create([
            'id' => Str::uuid(),
            'peran_id' => $admin->id,
            'nama_lengkap' => 'Admin PLN',
            'email' => 'admin@pln.co.id',
            'kata_sandi' => Hash::make('password'),
        ]);
    }
}
