<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    //สร้างตาราง product และฟิวล์ข้อมูลเพื่อเก็บข้อมูลลงดาต้าเบส
    public function up()
    {
        Schema::create('product', function (Blueprint $table) {
            $table->id();
            $table->integer('type_id')->nullable();
            $table->integer('shop_id');
            $table->string('name');
            $table->string('detail')->nullable();
            $table->string('img_product')->nullable();         
            $table->integer('amount');    
            $table->integer('amount2')->nullable();  
            $table->integer('cost');
            $table->string('datetosend')->nullable();
            $table->float('rating')->nullable();
            $table->integer('status')->default(1);
            $table->integer('weight')->nullable();
            $table->timestamp('date')->useCurrent();
            $table->integer('saleprice')->nullable();
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
        Schema::dropIfExists('product');
    }
}