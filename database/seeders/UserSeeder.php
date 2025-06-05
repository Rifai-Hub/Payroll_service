<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Karyawan;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $admin = User::create([
            'name' => 'Rifai',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('admin123'),
        ]);

        $admin->assignRole('admin');

        $user = User::create([
            'name' => 'user',
            'email' => 'user@gmail.com',
            'password' => bcrypt('user123'),
        ]);

        // Buat user Budi
        $userbudi = User::create([
            'name'     => 'Budi Santoso',
            'email'    => 'budi@mail.com',
            'password' => bcrypt('12345678'),
        ]);

        // Buat karyawan yang ditautkan ke Budi
        Karyawan::create([
            'nama'       => 'Budi Santoso',
            'pekerjaan'  => 'Digital Marketing',
            'email'      => 'budi@mail.com',
            'user_id'    => $userbudi->id,        // ← tautkan ke user
        ]);

        // 3) Buat user Aisyah
        $useraisyah = User::create([
            'name'     => 'Aisyah Rodibilah',
            'email'    => 'aisyah@mail.com',
            'password' => bcrypt('12345678'),
        ]);

        // 4) Buat karyawan yang ditautkan ke Aisyah
        Karyawan::create([
            'nama'       => 'Aisyah Rodibilah',
            'pekerjaan'  => 'Dokter Specialis Jantung',
            'email'      => 'aisyah@mail.com',
            'user_id'    => $useraisyah->id,      // ← tautkan ke user
        ]);
        

        $user->assignRole('user');
        $userbudi->assignRole('user');
        $useraisyah->assignRole('user');
    }
}
