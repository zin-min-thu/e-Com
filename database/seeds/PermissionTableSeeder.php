<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permissions = [
            'admin-list',
            'admin-create',
            'admin-edit',
            'admin-delete',
            'role-list',
            'role-create',
            'role-edit',
            'role-delete',
            'product-list',
            'product-create',
            'product-edit',
            'product-delete',
            'section-list',
            'section-create',
            'section-edit',
            'section-delete',
            'brand-list',
            'brand-create',
            'brand-edit',
            'brand-delete',
            'category-list',
            'category-create',
            'category-edit',
            'category-delete',
            'bunner-list',
            'bunner-create',
            'bunner-edit',
            'bunner-delete',
         ];
    
         foreach ($permissions as $permission) { 
              Permission::create(['name' => $permission]);
         }
    }
}
