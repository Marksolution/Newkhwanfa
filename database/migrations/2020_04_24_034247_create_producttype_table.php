<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProducttypeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    //สร้างตาราง producttype และฟิวล์ข้อมูลเพื่อเก็บข้อมูลลงดาต้าเบส
    public function up()
    {
        Schema::create('producttype', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            
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
        Schema::dropIfExists('producttype');
    }
}