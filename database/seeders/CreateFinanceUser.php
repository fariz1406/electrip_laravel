<?php
  
namespace Database\Seeders;
  
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
  
class CreateFinanceUser extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Membuat user
        $user = User::create([
            'name' => 'Finance Ihsan', 
            'email' => 'Finance@gmail.com',
            'password' => bcrypt('123')
        ]);
        
        // Membuat role Admin Finance
        $role = Role::create(['name' => 'Admin Finance']);
        
        // Menentukan permission yang diinginkan berdasarkan ID atau nama
        $permissions = Permission::where('name', 'pesanan-admin') // Berdasarkan ID
                        // ->where('name', 'pesanan-admin') // Berdasarkan nama
                        ->pluck('id', 'id')
                        ->all();
        
        // Menyinkronkan role dengan permission yang telah dipilih
        $role->syncPermissions($permissions);
        
        // Menugaskan role ke user
        $user->assignRole([$role->id]);
    }
}
