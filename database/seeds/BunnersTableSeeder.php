<?php

use App\Bunner;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class BunnersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $bunnerRecords = [
            [
                'image' => 'bunner1.png',
                'link' => '',
                'title' => 'Black Jacket',
                'alt' => 'Black Jacket',
                'status' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'image' => 'bunner2.png',
                'link' => '',
                'title' => 'Half Sleeve T-Shirt',
                'alt' => 'Half Sleeve T-Shirt',
                'status' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'image' => 'bunner3.png',
                'link' => '',
                'title' => 'Full Sleeve T-Shirt',
                'alt' => 'Full Sleeve T-Shirt',
                'status' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ];
        Bunner::insert($bunnerRecords);
    }
}
