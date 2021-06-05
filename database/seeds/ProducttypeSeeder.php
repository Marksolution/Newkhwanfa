<?php

use Illuminate\Database\Seeder;

class ProducttypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('producttype')->truncate();

        DB::table('producttype')->insert([
            'name' => 'อาหาร',
            
            
        ]);
        DB::table('producttype')->insert([
            'name' => 'อาหารหมักดอง',
            
        ]);
        DB::table('producttype')->insert([
            'name' => 'อาหารแห้ง',
            
        ]);
        DB::table('producttype')->insert([
            'name' => 'เครื่องแต่งกาย',
            
        ]);
        DB::table('producttype')->insert([
            'name' => 'จักสาน',
            
        ]);
        DB::table('producttype')->insert([
            'name' => 'ประดับตกแต่ง',
            
        ]);
        DB::table('producttype')->insert([
            'name' => 'เครื่องครัว',
            
        ]);
        
    }
}