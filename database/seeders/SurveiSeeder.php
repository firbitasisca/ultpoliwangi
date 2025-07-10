<?php

namespace Database\Seeders;

use App\Models\Survei;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SurveiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Survei::create([
            'id' => 1,
            'nama_survei' => 'Kepuasan Umum',
            'tahun' => 2023,
            'status' => 'Aktif',
        ]);
        Survei::create([
            'id' => 2,
            'nama_survei' => 'Proses Pengajuan',
            'tahun' => 2023,
            'status' => 'Tidak Aktif',
        ]);
        Survei::create([
            'id' => 3,
            'nama_survei' => 'Kualitas Informasi',
            'tahun' => 2023,
            'status' => 'Aktif',
        ]);
        Survei::create([
            'id' => 4,
            'nama_survei' => 'Saran dan Umpan Balik',
            'tahun' => 2023,
            'status' => 'Tidak Aktif',
        ]);
    }
}
