<?php

namespace Database\Seeders;

use App\Models\Karyawan;
use Illuminate\Database\Seeder;
use Illuminate\Foundation\Auth\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class KaryawanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Udah ga dipake
        // // 1) Buat user Budi
        // $userBudi = User::create([
        //     'name'     => 'Budi Santoso',
        //     'email'    => 'budi@mail.com',
        //     'password' => bcrypt('12345678'),
        // ]);

        // // 2) Buat karyawan yang ditautkan ke Budi
        // Karyawan::create([
        //     'nama'       => 'Budi Santoso',
        //     'pekerjaan'  => 'Digital Marketing',
        //     'email'      => 'budi@mail.com',
        //     'user_id'    => $userBudi->id,        // ← tautkan ke user
        // ]);

        // // 3) Buat user Aisyah
        // $userAisyah = User::create([
        //     'name'     => 'Aisyah Rodibilah',
        //     'email'    => 'aisyah@mail.com',
        //     'password' => bcrypt('12345678'),
        // ]);

        // // 4) Buat karyawan yang ditautkan ke Aisyah
        // Karyawan::create([
        //     'nama'       => 'Aisyah Rodibilah',
        //     'pekerjaan'  => 'Dokter Specialis Jantung',
        //     'email'      => 'aisyah@mail.com',
        //     'user_id'    => $userAisyah->id,      // ← tautkan ke user
        // ]);
    }
}
