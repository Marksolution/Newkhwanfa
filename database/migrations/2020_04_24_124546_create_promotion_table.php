<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePromotionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    //สร้างตาราง promotion และฟิวล์ข้อมูลเพื่อเก็บข้อมูลลงดาต้าเบส
    public function up()
    {
        Schema::create('promotion', function (Blueprint $table) {
            $table->id();
            $table->integer('shop_id');
            $table->string('name');
            $table->string('detail');
            $table->integer('product_id');
            $table->integer('amount');
            $table->integer('promotion_price');
            $table->date('startdate');
            $table->date('enddate');
            $table->string('img_promotion');   

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('promotion');
    }
}