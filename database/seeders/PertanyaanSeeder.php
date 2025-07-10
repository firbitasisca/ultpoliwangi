<?php

namespace Database\Seeders;

use App\Models\Pertanyaan;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PertanyaanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Pertanyaan::create([
            'id' => 1,
            'pertanyaan' => 'Seberapa puaskah Anda dengan proses pengajuan melalui Unit Layanan Terpadu?',
        ]);
        Pertanyaan::create([
            'id' => 2,
            'pertanyaan' => 'Sejauh mana tingkat keterbukaan dan informasi yang diberikan oleh petugas layanan kepada Anda?',
        ]);
        Pertanyaan::create([
            'id' => 3,
            'pertanyaan' => 'Bagaimana pengalaman Anda dalam berinteraksi dengan sistem pengajuan online yang disediakan?',
        ]);
        Pertanyaan::create([
            'id' => 4,
            'pertanyaan' => 'Apakah Anda merasa waktu respons dari Unit Layanan Terpadu sudah cukup memadai?',
        ]);
        Pertanyaan::create([
            'id' => 5,
            'pertanyaan' => 'Bagaimana pendapat Anda tentang kualitas komunikasi antara Anda dan petugas layanan selama proses ini?',
        ]);
        Pertanyaan::create([
            'id' => 6,
            'pertanyaan' => 'Apakah Anda merasa kebutuhan dan pertanyaan Anda terpenuhi dengan baik selama proses pengajuan?',
        ]);
        Pertanyaan::create([
            'id' => 7,
            'pertanyaan' => 'Seberapa efisien menurut Anda sistem pengajuan ini dalam memproses permohonan Anda?',
        ]);
    }
}
