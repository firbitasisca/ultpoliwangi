<?php

namespace Database\Seeders;

use App\Models\PertanyaanSurvei;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PertanyaanSurveiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        PertanyaanSurvei::create([
            'id' => 1,
            'id_survei' => 1,
            'id_pertanyaan' => 1,
        ]);
        PertanyaanSurvei::create([
            'id' => 2,
            'id_survei' => 1,
            'id_pertanyaan' => 7,
        ]);
        PertanyaanSurvei::create([
            'id' => 3,
            'id_survei' => 3,
            'id_pertanyaan' => 2,
        ]);
        PertanyaanSurvei::create([
            'id' => 4,
            'id_survei' => 3,
            'id_pertanyaan' => 5,
        ]);
    }
}
