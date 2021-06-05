<?php

use Illuminate\Database\Seeder;

class OrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('order')->truncate();

        DB::table('order')->insert([
            'user_id' => 10,
            'total_price' => 1090,
            'address_id' => 1,
            'shop_id' => 1,
            'shipping_cost' => 100,  
            'code_coupon' => '123',    
                   
            'status' => 1,
        ]);
        DB::table('order')->insert([
            'user_id' => 2,
            'total_price' => 390,
            'address_id' => 1,
            'shop_id' => 1,
            'shipping_cost' => 100,
            'tracking_number' => 'RE209934646TH',
            'code_coupon' => '123',
            'updated_at' => '2021-04-18 16:13:02',
            'status' => 3,
        ]);
    }
}