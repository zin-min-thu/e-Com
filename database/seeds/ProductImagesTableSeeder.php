<?php

use Illuminate\Database\Seeder;
use App\ProductImage;
use Carbon\Carbon;

class ProductImagesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            [
                'product_id' => 1,
                'image' => "2020-08-16-10-17-17.png",
                'status' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]
        ];
        ProductImage::insert($data);
    }
}
