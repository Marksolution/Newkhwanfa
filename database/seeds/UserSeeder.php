<?php

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->truncate();

        DB::table('users')->insert([
            'name' => 'ขวัญฟ้า',
            'email' => 'mark@hotmail.com',
            'password' =>Hash::make('123456789'),
            'phone' => '0811111111',
            'role' => 0
          
        ]);
        DB::table('users')->insert([
            'name' => 'แม่ถ้วน',
            'email' => 'mark2@hotmail.com',
            'password' =>Hash::make('123456789'),
            'phone' => '0822222222',
            'role' => 1
          
        ]);
        DB::table('users')->insert([
            'name' => 'กลุ่มวิสาหกิจชุมชนแม่บ้านกองนาง',
            'email' => 'mark3@hotmail.com',
            'password' =>Hash::make('123456789'),
            'phone' => '0833333333',
            'role' => 1
          
        ]);
        DB::table('users')->insert([
            'name' => 'นางเตือนใจ สมรื่น',
            'email' => 'mark4@hotmail.com',
            'password' =>Hash::make('123456789'),
            'phone' => '0844444444',
            'role' => 1
          
        ]);
        DB::table('users')->insert([
            'name' => 'ร้านแม่อารักษ์',
            'email' => 'mark5@hotmail.com',
            'password' =>Hash::make('123456789'),
            'phone' => '0855555555',
            'role' => 1
          
        ]);
        DB::table('users')->insert([
            'name' => 'นางสาววิไล นันทา',
            'email' => 'mark6@hotmail.com',
            'password' =>Hash::make('123456789'),
            'phone' => '0866666666',
            'role' => 1
          
        ]);
        DB::table('users')->insert([
            'name' => 'เกษตรตามอำเภอใจ',
            'email' => 'mark7@hotmail.com',
            'password' =>Hash::make('123456789'),
            'phone' => '0877777777',
            'role' => 1
          
        ]);
         DB::table('users')->insert([
            'name' => 'กลุ่มสตรีสหกรณ์เกษตรสังคม',
            'email' => 'mark8@hotmail.com',
            'password' =>Hash::make('123456789'),
            'phone' => '0888888888',
            'role' => 1
          
        ]);
        DB::table('users')->insert([
            'name' => 'กลุ่มแปรรูปอาหาร-ผลไม้บ้านกองนาง',
            'email' => 'mark9@hotmail.com',
            'password' =>Hash::make('123456789'),
            'phone' => '0899999999',
            'role' => 1
          
        ]);
        DB::table('users')->insert([
            'name' => 'สิรินาถ',
            'email' => 'jariyapun17@gmail.com',
            'password' =>Hash::make('123456789'),
            'phone' => '0610766798',
            'role' => 1
          
        ]);
    }
}