<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RolePermissionSeeder extends Seeder
{
     public function run(): void
    {
        Permission::create(['name'=>'tambah-user']);
        Permission::create(['name'=>'edit-user']);
        Permission::create(['name'=>'hapus-user']);
        Permission::create(['name'=>'lihat-user']);

        Permission::create(['name'=>'tambah-tulisan']);
        Permission::create(['name'=>'edit-tulisan']);
        Permission::create(['name'=>'hapus-tulisan']);
        Permission::create(['name'=> 'lihat-tulisan']);

        Role::create(['name'=>'admin']);
        Role::create(['name'=>'penulis']);

        $roleAdmin=Role::findByName('admin');
        $roleAdmin->givePermissionTo('tambah-user');
        $roleAdmin->givePermissionTo('edit-user');
        $roleAdmin->givePermissionTo('hapus-user');
        $roleAdmin->givePermissionTo('lihat-user');

        $rolePenulis=Role::findByName('penulis');
        $rolePenulis->givePermissionTo('tambah-user');
        $rolePenulis->givePermissionTo('edit-user');
        $rolePenulis->givePermissionTo('hapus-user');
        $rolePenulis->givePermissionTo('lihat-user');
     }
}
