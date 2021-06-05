<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAddressTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    //สร้างตาราง address และฟิวล์ข้อมูลเพื่อเก็บข้อมูลลงดาต้าเบส
    public function up()
    {
        Schema::create('address', function (Blueprint $table) {
            $table->id();
            $table->string('address_name');
            $table->string('address');
            $table->string('address2')->nullable();
            $table->string('status')->nullable();
            $table->string('province_id');
            $table->integer('user_id');
            $table->string('district_id');
            $table->string('amphure_id');
            $table->integer('postcode');
            $table->string('firstname')->nullable();
            $table->string('lastname')->nullable();
            $table->string('telephone');
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
        Schema::dropIfExists('address');
    }
}