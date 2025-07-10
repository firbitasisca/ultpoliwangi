<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // admin
        User::create([
            'id' => 1,
            'name' => 'ultpoliwangi',
            'email' => 'ultpoliwangi@gmail.com',
            'password' => bcrypt('ultpoliwangi123')
        ]);

        User::create([
            'id' => 2,
            'name' => 'sekretaris',
            'email' => 'sekretaris@gmail.com',
            'password' => bcrypt('sekretaris123')
        ]);

        User::create([
            'id' => 3,
            'name' => 'keuangan',
            'email' => 'keuangan@gmail.com',
            'password' => bcrypt('keuangan123')
        ]);

        User::create([
            'id' => 4,
            'name' => 'akademikdankemahasiswaan',
            'email' => 'akademikdankemahasiswaan@gmail.com',
            'password' => bcrypt('akademikdankemahasiswaan123')
        ]);

        User::create([
            'id' => 5,
            'name' => 'umumdankepegawaian',
            'email' => 'umumdankepegawaian@gmail.com',
            'password' => bcrypt('umumdankepegawaian123')
        ]);

        User::create([
            'id' => 6,
            'name' => 'pengadaan',
            'email' => 'pengadaan@gmail.com',
            'password' => bcrypt('pengadaan123')
        ]);

        User::create([
            'id' => 7,
            'name' => 'barangmiliknegara',
            'email' => 'barangmiliknegara@gmail.com',
            'password' => bcrypt('barangmiliknegara123')
        ]);

        User::create([
            'id' => 8,
            'name' => 'konsultasi',
            'email' => 'konsultasi@gmail.com',
            'password' => bcrypt('konsultasi123')
        ]);

        User::create([
            'id' => 9,
            'name' => 'other',
            'email' => 'other@gmail.com',
            'password' => bcrypt('other123')
        ]);

        // admin
        User::create([
            'id' => 10,
            'name' => 'tefa',
            'email' => 'magangti2023@gmail.com',
            'password' => bcrypt('tefa2023')
        ]);
    }
}
