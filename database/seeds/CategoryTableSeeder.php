<?php

use Illuminate\Database\Seeder;
use App\Category;
use Carbon\Carbon;
class CategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categoryData = [
            [
                'parent_id' => 0,
                'section_id' => 1,
                'name' => 'T-Shirts',
                'discount' => 0,
                'description' => '',
                'url' => 't-shirts',
                'status' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'parent_id' => 1,
                'section_id' => 1,
                'name' => 'Casual T-Shirts',
                'discount' => 0,
                'description' => '',
                'url' => 'casual-t-shirts',
                'status' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]
        ];
        
        Category::insert($categoryData);
    }
}
