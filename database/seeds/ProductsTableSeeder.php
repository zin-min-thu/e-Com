<?php

use Illuminate\Database\Seeder;
use App\Product;
use Carbon\Carbon;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $productDatas = [
            [
                'category_id' => 4,
                'section_id' => 1,
                'name' => 'Blue Casual T-Shirt',
                'code' => 'BT001',
                'color' => 'Blue',
                'price' => '1500',
                'discount' => 10,
                'weight' => 200,
                'wash_care' => '',
                'fabric' => '',
                'pattern' => '',
                'sleeve' => '',
                'fit' => '',
                'occasion' => '',
                'is_featured' => 'No',
                'status' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'category_id' => 4,
                'section_id' => 1,
                'name' => 'Red Casual T-Shirt',
                'code' => 'R001',
                'color' => 'Red',
                'price' => '2000',
                'discount' => 10,
                'weight' => 200,
                'wash_care' => '',
                'fabric' => '',
                'pattern' => '',
                'sleeve' => '',
                'fit' => '',
                'occasion' => '',
                'is_featured' => 'Yes',
                'status' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]
        ];

        Product::insert($productDatas);
    }
}
