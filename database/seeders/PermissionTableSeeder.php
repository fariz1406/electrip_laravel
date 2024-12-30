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
        //    'role-list',
        //    'role-create',
        //    'role-edit',
        //    'role-delete',
        //    'product-list',
        //    'product-create',
        //    'product-edit',
        //    'product-delete'

            // 'login-1',
            // 'register-1',
            // 'logout-1'

            // 'verif',
            // 'create-verif'
            // 'profile-show',
            // 'profile-tambah',
            // 'profile-edit',
            // 'profile-delete',
            // 'profile-update',

            // 'verif-user',
            // 'show-user',
            // 'update-user',

            
            // 'kendaraan-show',
            // 'kendaraan-manage'

            'pesanan-pengguna',
            'pesanan-admin'
        ];
        
        foreach ($permissions as $permission) {
             Permission::create(['name' => $permission]);
        }
    }
}
