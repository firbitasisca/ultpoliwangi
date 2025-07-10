<?php

namespace Database\Seeders;

use App\Models\Layanan;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LayananSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Layanan::create([
            'id' => 1,
            'nama_layanan' => 'Rancang Mutu Perkuliahan',
            'estimasi_layanan' => 3,
            'id_divisi' => 1,
        ]);

        Layanan::create([
            'id' => 2,
            'nama_layanan' => 'Permohonan Rekomendasi MBKM (MSIB)',
            'estimasi_layanan' => 4,
            'id_divisi' => 4,
        ]);
    }
}
