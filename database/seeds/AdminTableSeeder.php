<?php

namespace Database\Seeders;

use App\Admin;
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
        $admin = Admin::where('type','admin')->first();

        $role = Role::create(['name' => 'admin']);

        $permissions = Permission::pluck('id','id')->all();
  
        $role->syncPermissions($permissions);

        $admin->assignRole([$role->id]);
    }
}
