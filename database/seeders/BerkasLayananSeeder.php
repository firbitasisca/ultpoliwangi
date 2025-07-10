<?php

namespace Database\Seeders;

use App\Models\BerkasLayanan;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BerkasLayananSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        BerkasLayanan::create([
            'id_berkas' => 1,
            'id_layanan' => 1,
        ]);
        BerkasLayanan::create([
            'id_berkas' => 2,
            'id_layanan' => 1,
        ]);
        BerkasLayanan::create([
            'id_berkas' => 3,
            'id_layanan' => 1,
        ]);
        BerkasLayanan::create([
            'id_berkas' => 4,
            'id_layanan' => 1,
        ]);
        BerkasLayanan::create([
            'id_berkas' => 5,
            'id_layanan' => 1,
        ]);

        BerkasLayanan::create([
            'id_berkas' => 4,
            'id_layanan' => 2,
        ]);
        BerkasLayanan::create([
            'id_berkas' => 5,
            'id_layanan' => 2,
        ]);
    }
}
