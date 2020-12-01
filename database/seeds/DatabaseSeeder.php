<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Http\Controllers\Admin\ProductController;
use App\ProductAttribute;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        $this->call(AdminsTableSeeder::class);
        $this->call(SectionsTableSeeder::class);
        $this->call(ProductsTableSeeder::class);
        $this->call(ProductAttribute::class);
        $this->call(BrandsTableSeeder::class);
        $this->call(BunnersTableSeeder::class);
        $this->call(PermissionTableSeeder::class);
        $this->call(AdminTableSeeder::class);
    }
}
