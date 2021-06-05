<?php

use Illuminate\Database\Seeder;

class PromotionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('promotion')->truncate();

        DB::table('promotion')->insert([
            
            'shop_id'=> 1,
            'name' => 'ลดจัดเต็ม',
            'detail'=> 'ลดราคาสินค้า จัดเต็มกันไปเลย!',
            'product_id'=> 3,
            'promotion_price'=> '30',
            'amount'=> 1,
            'startdate'=> '2021-02-15',
            'enddate'=> '2021-02-19',
            'img_promotion'=>  "promotion/X2pgDB8MexFkAOoOTqixPRjUTcZuRLcv7XSIxcWZ.jpeg"
        ]);
        DB::table('promotion')->insert([
            
            'shop_id'=> 2,
            'name' => 'ลดหนักมาก',
            'detail'=> 'ลดหนักมาก !',
            'product_id'=> 7,
            'promotion_price'=> '30',
            'amount'=> 1,
            'startdate'=> '2021-02-15',
            'enddate'=> '2021-02-19',
            'img_promotion'=>  "promotion/5d9163a0181e438bbeeb9f4b3f492180.jpg"
        ]);
        DB::table('promotion')->insert([
            
            'shop_id'=> 3,
            'name' => 'ลดแบบจัดเต็ม',
            'detail'=> 'ลดหนักมาก !',
            'product_id'=> 8,
            'promotion_price'=> '30',
            'amount'=> 1,
            'startdate'=> '2021-02-15',
            'enddate'=> '2021-02-19',
            'img_promotion'=>  "promotion/3-1538.jpg"
        ]);
        DB::table('promotion')->insert([
            
            'shop_id'=> 4,
            'name' => 'ลดราคาสินค้า',
            'detail'=> 'ลดหนักมาก !',
            'product_id'=> 9,
            'promotion_price'=> '30',
            'amount'=> 1,
            'startdate'=> '2021-02-15',
            'enddate'=> '2021-02-19',
            'img_promotion'=>  "promotion/b8ec8de64d7b62039795b30ed68336cd.jpg"
        ]);
        DB::table('promotion')->insert([
            
            'shop_id'=> 1,
            'name' => 'ลดจัดเต็ม',
            'detail'=> 'ลดหนักมาก !',
            'product_id'=> 4,
            'promotion_price'=> '30',
            'amount'=> 1,
            'startdate'=> '2021-02-15',
            'enddate'=> '2021-02-19',
            'img_promotion'=>  "promotion/ykK1pLpo1xgJw7WAugWwBUyY5kAExOY8RAnCl38P.jpeg"
        ]);
        DB::table('promotion')->insert([
            
            'shop_id'=> 1,
            'name' => 'ลดจัดเต็ม',
            'detail'=> 'ลดหนักมาก !',
            'product_id'=> 2,
            'promotion_price'=> '30',
            'amount'=> 1,
            'startdate'=> '2021-02-15',
            'enddate'=> '2021-02-19',
            'img_promotion'=>  "promotion/zjefWQnygVairsXS5hIQ9g4mBxM9IFKbOGOAF1is.jpeg"
        ]);
    }
}