<?php

use Illuminate\Database\Seeder;

class ShopSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('shop')->truncate();

        DB::table('shop')->insert([
            'name' => 'ขวัญฟ้า',
            'user_id' => 1,
            'address_id' => 1,
            'account_number' =>'111-1-11111-1',
            'account_name' =>'ขวัญฟ้า',
            'bank' =>'กรุงไทย',
        ]);

        DB::table('shop')->insert([
            'name' => 'แม่ถ้วน',
            'user_id' => 2,
            'address_id' => 1,
            'account_number' =>'222-2-22222-2',
            'account_name' =>'แม่ถ้วน',
            'bank' =>'กรุงไทย',
        ]);

        DB::table('shop')->insert([
            'name' => 'กลุ่มวิสาหกิจชุมชนแม่บ้านกองนาง',
            'user_id' => 3,
            'address_id' => 1,
            'account_number' =>'333-3-33333-3',
            'account_name' =>'กลุ่มวิสาหกิจชุมชนแม่บ้านกองนาง',
            'bank' =>'กรุงไทย',
        ]);

        DB::table('shop')->insert([
            'name' => 'นางเตือนใจ สมรื่น',
            'user_id' => 4,
            'address_id' => 1,
            'account_number' =>'444-4-44444-4',
            'account_name' =>'นางเตือนใจ สมรื่น',
            'bank' =>'กรุงไทย',
        ]);

        DB::table('shop')->insert([
            'name' => 'ร้านแม่อารักษ์',
            'user_id' => 5,
            'address_id' => 1,
            'account_number' =>'555-5-55555-5',
            'account_name' =>'ร้านแม่อารักษ์',
            'bank' =>'กรุงไทย',
        ]);

        DB::table('shop')->insert([
            'name' => 'นางสาววิไล นันทา',
            'user_id' => 6,
            'address_id' => 1,
            'account_number' =>'666-6-66666-6',
            'account_name' =>'นางสาววิไล นันทา',
            'bank' =>'กรุงไทย',
        ]);

        DB::table('shop')->insert([
            'name' => 'เกษตรตามอำเภอใจ',
            'user_id' => 7,
            'address_id' => 1,
            'account_number' =>'777-7-77777-7',
            'account_name' =>'เกษตรตามอำเภอใจ',
            'bank' =>'กรุงไทย',
        ]);

        DB::table('shop')->insert([
            'name' => 'กลุ่มสตรีสหกรณ์เกษตรสังคม',
            'user_id' => 8,
            'address_id' => 1,
            'account_number' =>'888-8-88888-8',
            'account_name' =>'กลุ่มสตรีสหกรณ์เกษตรสังคม',
            'bank' =>'กรุงไทย',
        ]);

        DB::table('shop')->insert([
            'name' => 'กลุ่มแปรรูปอาหาร-ผลไม้บ้านกองนาง',
            'user_id' => 9,
            'address_id' => 1,
            'account_number' =>'999-9-99999-9',
            'account_name' =>'กลุ่มแปรรูปอาหาร-ผลไม้บ้านกองนาง',
            'bank' =>'กรุงไทย',
        ]);
    }
}