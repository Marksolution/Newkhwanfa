<?php

use Illuminate\Database\Seeder;

class OrderDetailSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('orderdetail')->truncate();

        DB::table('orderdetail')->insert([
            'order_id' => 1,
            'product_id' => 2,
            'quantity' => 10,
            'total_price' => 490,            
        ]);
        DB::table('orderdetail')->insert([
            'order_id' => 1,
            'product_id' => 6,
            'quantity' => 10,
            'total_price' => 600,            
        ]);
        DB::table('orderdetail')->insert([
            'order_id' => 2,
            'product_id' => 1,
            'quantity' => 10,
            'total_price' => 390,            
        ]);
    }
}