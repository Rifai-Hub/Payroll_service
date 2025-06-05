<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class RolePermissions extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Permission::create(['name' => 'buat_user']);
        Permission::create(['name' => 'lihat_user']);
        Permission::create(['name' => 'ubah_user']);
        Permission::create(['name' => 'hapus_user']);

        Permission::create(['name' => 'lihat_view']); 
        Permission::create(['name' => 'buat_view']);
        Permission::create(['name' => 'ubah_view']);
        Permission::create(['name' => 'hapus_view']);

        Role::create(['name' => 'admin']);
        Role::create(['name' => 'user']);

        $admin = Role::findByName('admin');
        $admin->givePermissionTo(Permission::all());

        $user = Role::findByName('user');
        $user->givePermissionTo([
            'lihat_view',
            'buat_view',
            'ubah_view',
            'hapus_view'
        ]);

    }
}
