<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAddressShopTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('address_shop', function (Blueprint $table) {
            $table->id();
            $table->string('address');
            $table->string('province_id');
            $table->integer('user_id');
            $table->string('district_id');
            $table->string('amphure_id');
            $table->string('postcode');
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
        Schema::dropIfExists('address_shop');
    }
}