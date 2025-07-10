
<?php

// namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use Database\Seeders\AdminSeeder;
use Database\Seeders\BerkasLayananSeeder;
use Database\Seeders\BerkasSeeder;
use Database\Seeders\DivisiSeeder;
use Database\Seeders\LayananSeeder;
use Database\Seeders\PertanyaanSeeder;
use Database\Seeders\PertanyaanSurveiSeeder;
use Database\Seeders\ProdiSeeder;
use Database\Seeders\SurveiSeeder;
use Database\Seeders\UserSeeder;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            DivisiSeeder::class,
            UserSeeder::class,
            AdminSeeder::class,

            LayananSeeder::class,
            BerkasSeeder::class,
            BerkasLayananSeeder::class,

            ProdiSeeder::class,
            PertanyaanSeeder::class,
            SurveiSeeder::class,

            PertanyaanSurveiSeeder::class,
        ]);
    }
}
