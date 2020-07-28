<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;
use App\Admin;
class AdminsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $adminRecords = [
            [
                'name' => 'admin',
                'type' => 'admin',
                'mobile' => '09977899363',
                'email' => 'admin@gmail.com',
                'password' => bcrypt('123456'),
                'image' => '',
                'status' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'john',
                'type' => 'subadmin',
                'mobile' => '09977899363',
                'email' => 'john@gmail.com',
                'password' => bcrypt('123456'),
                'image' => '',
                'status' => 0,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'steve',
                'type' => 'subadmin',
                'mobile' => '09977899363',
                'email' => 'steve@gmail.com',
                'password' => bcrypt('123456'),
                'image' => '',
                'status' => 0,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'amit',
                'type' => 'admin',
                'mobile' => '09977899363',
                'email' => 'amit@gmail.com',
                'password' => bcrypt('123456'),
                'image' => '',
                'status' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]
        ];
        DB::table('admins')->insert($adminRecords);
    }
}
