<?php

use Illuminate\Database\Seeder;
use App\Brand;
use Carbon\Carbon;

class BrandsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $brandRecords = [
            ['name' => 'Arrow', 'status' => 1, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['name' => 'Gap', 'status' => 1, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['name' => 'Lee', 'status' => 1, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['name' => 'Monte Carlo', 'status' => 1, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['name' => 'Peter England', 'status' => 1, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
        ];

        Brand::insert($brandRecords);
    }
}
