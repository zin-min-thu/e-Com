<?php

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
    }
}
