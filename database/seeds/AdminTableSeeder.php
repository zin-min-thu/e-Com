<?php

namespace Database\Seeders;

use App\Admin;
use Carbon\Carbon;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Database\Seeder;

class AdminTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = Admin::create([
            'name' => 'KzShopp',
            'type' => 'admin',
            'mobile' => '09977899363',
            'email' => 'kzshop.mm@gmail.com',
            'password' => bcrypt('123456'),
            'image' => '',
            'status' => 1,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        $roleCount = Role::where('name', 'admin')->count();
        if($roleCount > 0) {
            $role = Role::where('name', 'admin')->first();
        } else {
            $role = Role::create(['name' => 'admin']);
        }

        $permissions = Permission::pluck('id','id')->all();
  
        $role->syncPermissions($permissions);

        $admin->assignRole([$role->id]);
    }
}
