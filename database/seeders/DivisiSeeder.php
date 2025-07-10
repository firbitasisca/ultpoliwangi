<?php

namespace Database\Seeders;

use App\Models\Divisi;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DivisiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Divisi::create([
            'id' => 1,
            'nama_divisi' => 'Unit Layanan Terpadu',
        ]);
        Divisi::create([
            'id' => 2,
            'nama_divisi' => 'Sekretaris',
        ]);
        Divisi::create([
            'id' => 3,
            'nama_divisi' => 'Keuangan',
        ]);
        Divisi::create([
            'id' => 4,
            'nama_divisi' => 'Akademik dan Kemahasiswaan',
        ]);
        Divisi::create([
            'id' => 5,
            'nama_divisi' => 'Umum dan Kepegawaian',
        ]);
        Divisi::create([
            'id' => 6,
            'nama_divisi' => 'Pengadaan',
        ]);
        Divisi::create([
            'id' => 7,
            'nama_divisi' => 'Barang Milik Negara',
        ]);
        Divisi::create([
            'id' => 8,
            'nama_divisi' => 'Konsultasi',
        ]);
        Divisi::create([
            'id' => 9,
            'nama_divisi' => 'Other',
        ]);
    }
}
