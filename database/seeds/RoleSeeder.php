<?php

use Illuminate\Database\Seeder;
use Cartalyst\Sentinel\Laravel\Facades\Sentinel;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Role for admin
        $role_admin = [
            'slug' => 'admin',
            'name' => 'Admin',
            'permissions' => [
                'admin' => true
            ]
        ];

        // Role for guru
        $role_guru = [
            'slug' => 'guru',
            'name' => 'Guru',
            'permissions' => [
                'main' => true,
                'main.kelas' => true,
                'main.siswa' => true,
                'main.jurusan' => true,
                'main.kelas' => true,
                'siswa.show' => true,
                'kelas.show' => true,
                'nilai.edit' => true,
                'nilai.show' => true,
                'nilai.update' => true
            ]
        ];
        
        // Insert admin role
        Sentinel::getRoleRepository()->createModel()
        ->fill($role_admin)->save();

        // Insert guru role
        Sentinel::getRoleRepository()->createModel()
        ->fill($role_guru)->save();

        $admin = Sentinel::findRoleByName('Admin');
        $user = Sentinel::getUserRepository()->where('email', 'galih@mail.com')->first();
        $user->roles()->attach($admin);

        $guru = Sentinel::findRoleByName('Guru');
        $user = Sentinel::getUserRepository()->where('email', 'galihanggara@mail.com')->first();
        $user->roles()->attach($guru);
    }
}
