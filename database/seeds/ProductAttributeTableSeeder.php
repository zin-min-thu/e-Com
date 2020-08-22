<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use App\ProductAttribute;

class ProductAttributeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $product_attribute = [
            [
                'product_id' => 1,
                'size' => 'Small',
                'price' => 1200,
                'stock' => 10,
                'sku' => 'BT001-S',
                'status' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'product_id' => 1,
                'size' => 'Medium',
                'price' => 1300,
                'stock' => 20,
                'sku' => 'BT001-M',
                'status' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'product_id' => 1,
                'size' => 'Large',
                'price' => 1400,
                'stock' => 10,
                'sku' => 'BT001-L',
                'status' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ];

        ProductAttribute::insert($product_attribute);
    }
}
