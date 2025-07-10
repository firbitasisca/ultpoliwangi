<?php

namespace Database\Seeders;

use App\Models\Admin;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Admin::create([
            'id_user' => 1,
            'id_divisi' => 1,
        ]);

        Admin::create([
            'id_user' => 2,
            'id_divisi' => 2,
        ]);

        Admin::create([
            'id_user' => 3,
            'id_divisi' => 3,
        ]);

        Admin::create([
            'id_user' => 4,
            'id_divisi' => 4,
        ]);

        Admin::create([
            'id_user' => 5,
            'id_divisi' => 5,
        ]);

        Admin::create([
            'id_user' => 6,
            'id_divisi' => 6,
        ]);

        Admin::create([
            'id_user' => 7,
            'id_divisi' => 7,
        ]);

        Admin::create([
            'id_user' => 8,
            'id_divisi' => 8,
        ]);

        Admin::create([
            'id_user' => 9,
            'id_divisi' => 9,
        ]);

        Admin::create([
            'id_user' => 10,
            'id_divisi' => 1,
        ]);
    }
}
