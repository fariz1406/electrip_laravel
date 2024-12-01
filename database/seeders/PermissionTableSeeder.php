<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $permissions = [
            // // User Permissions
            // 'user-list',
            // 'user-create',
            // 'user-edit',
            // 'user-delete',

            // // Role Permissions
            // 'role-list',
            // 'role-create',
            // 'role-edit',
            // 'role-delete',

            // // Product Permissions
            // 'product-list',
            // 'product-create',
            // 'product-edit',
            // 'product-delete',

            // // Kendaraan Permissions
            // 'kendaraan-list',
            // 'kendaraan-create',
            // 'kendaraan-edit',
            // 'kendaraan-delete',

            // // Pesanan Permissions
            // 'pesanan-list',
            // 'pesanan-create',
            // 'pesanan-edit',
            // 'pesanan-delete',
            // 'pesanan-status-belum-dibayar',
            // 'pesanan-status-diproses',
            // 'pesanan-status-dikirim',
            // 'pesanan-status-dipakai',

            // 'login-1',
            // 'register-1',
            // 'logout-1'

            'list-user',


            'profile-show',
            'profile-tambah',
            'profile-edit',
            'profile-delete',
            'profile-update',

            'verif-user',
            'show-user',
            'update-user',

            'verif',
            'create-verif'

        
        ];

        foreach ($permissions as $permission) {
            Permission::create(['name' => $permission]);
        }
    }
}
