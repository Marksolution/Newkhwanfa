<?php

use Illuminate\Database\Seeder;

class PaymentDetailSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('paymentdetail')->truncate();

        DB::table('paymentdetail')->insert([
           
            'payment_id' => 1,
            'order_id' => 1,
            'product_id' => 6,
            'shop_id' => 1,
            'quantity' => 10,
            
        ]);
        DB::table('paymentdetail')->insert([
           
            'payment_id' => 1,
            'order_id' => 1,
            'product_id' => 2,
            'shop_id' => 1,
            'quantity' => 10,
         
        ]);
        DB::table('paymentdetail')->insert([
           
            'payment_id' => 2,
            'order_id' => 2,
            'product_id' => 1,
            'shop_id' => 1,
            'quantity' => 10,
        ]);
    }
}