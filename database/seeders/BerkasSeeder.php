<?php

namespace Database\Seeders;

use App\Models\Berkas;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BerkasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Berkas::create([
            'id' => 1,
            'nama_berkas' => 'Proposal Rancang Mutu Perkuliahan',
            'jenis_berkas' => 'Wajib',
        ]);
        Berkas::create([
            'id' => 2,
            'nama_berkas' => 'Daftar Materi Perkuliahan',
            'jenis_berkas' => 'Wajib',
        ]);
        Berkas::create([
            'id' => 3,
            'nama_berkas' => 'Bahan Ajar dan Materi Pendukung',
            'jenis_berkas' => 'Wajib',
        ]);
        Berkas::create([
            'id' => 4,
            'nama_berkas' => 'Rencana Evaluasi dan Penilaian',
            'jenis_berkas' => 'Wajib',
        ]);
        Berkas::create([
            'id' => 5,
            'nama_berkas' => 'Jadwal Pelaksanaan Perkuliahan',
            'jenis_berkas' => 'Wajib',
        ]);
    }
}
