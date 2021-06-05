<?php

use Illuminate\Database\Seeder;

class PaymentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('payment')->truncate();

        DB::table('payment')->insert([
            
           
            'user_id' => 10,
            'totalprice' => 1090,
            'image' => 'payment/161899322_445443349897921_561681591472649954_n.jpg',
            'status' => 1
        ]);
        DB::table('payment')->insert([
            
            
            'user_id' => 2,
            'totalprice' => 390,
            'image' => 'payment/161899322_445443349897921_561681591472649954_n.jpg',
            'status' => 3
        ]);
    }
}