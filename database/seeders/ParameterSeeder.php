<?php

namespace Database\Seeders;

use App\Models\Parameter;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ParameterSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Parameter::create([
            'kode' => 'K001',
            'jenis' => 'Jenis1',
            'nama' => 'Nama1',
            'status' => 'Aktif',
        ]);

        Parameter::create([
            'kode' => 'K002',
            'jenis' => 'Jenis2',
            'nama' => 'Nama2',
            'status' => 'Nonaktif',
        ]);
    }
}
