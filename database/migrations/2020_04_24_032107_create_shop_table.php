<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateShopTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    //สร้างตาราง shop และฟิวล์ข้อมูลเพื่อเก็บข้อมูลลงดาต้าเบส
    public function up()
    {
        Schema::create('shop', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->string('name');
            $table->integer('address_id');
            $table->string('account_number');
            $table->string('account_name');
            $table->string('bank');
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
        Schema::dropIfExists('shop');
    }
}