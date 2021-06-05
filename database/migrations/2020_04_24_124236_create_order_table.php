<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
class CreateOrderTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    //สร้างตาราง order และฟิวล์ข้อมูลเพื่อเก็บข้อมูลลงดาต้าเบส
    public function up()
    {
        Schema::create('order', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');         
            $table->integer('code_coupon');      
            $table->integer('total_price');
            $table->integer('address_id');
            $table->integer('shop_id')->nullable(); 
            $table->string('tracking_number')->nullable();            
            $table->integer('shipping_cost');
            $table->double('tranfer')->nullable();  
            $table->integer('status');
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
        Schema::dropIfExists('order');
    }
}