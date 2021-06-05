<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Datepicker extends Model
{
    //เป็นการดึงตาราง datepickers ของฐานข้อมูลมาใช้งาน
    public function up()
    {
        Schema::create('datepickers', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->date('date');
            $table->timestamps();
        });
    }
}
