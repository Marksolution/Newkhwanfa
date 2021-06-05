<?php

use Illuminate\Database\Seeder;

class AddressSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('address')->truncate();

        DB::table('address')->insert([
            'address_name' => 'ที่อยู่ร้าน',
            'address' => '326/8',
            'province_id' => 'หนองคาย',
            'user_id' => 1,
            'district_id' => 'หนองกอมเกาะ',
            'amphure_id' =>'เมืองหนองคาย',
            'firstname' => 'นฤเบศร์',
            'lastname' => 'พระโรจน์',
            'postcode' => 43000,
            'telephone' => '0812345678',
        ]);
        DB::table('address')->insert([
            'address_name' => 'ที่อยู่ร้าน',
            'address' => '112 หมู่7',
            'province_id' => 'หนองคาย',
            'user_id' => 1,
            'district_id' => 'หนองกอมเกาะ',
            'amphure_id' =>'เมืองหนองคาย',
            'firstname' => 'สิรินาถ',
            'lastname' => 'จริยพันธ์',
            'postcode' => 43000,
            'telephone' => '0812345678',
        ]);
        DB::table('address')->insert([
            'address_name' => 'ที่อยู่ร้าน',
            'address' => '87/2 หมู่3',
            'province_id' => 'หนองคาย',
            'user_id' => 1,
            'district_id' => 'หนองกอมเกาะ',
            'amphure_id' =>'เมืองหนองคาย',
            'firstname' => 'นฤเบศร์',
            'lastname' => 'พระโรจน์',
            'postcode' => 43000,
            'telephone' => '0812345688',
        ]);
    }
}