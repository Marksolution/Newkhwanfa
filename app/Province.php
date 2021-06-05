<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Province extends Model
{
    //เป็นการดึงตาราง province ของฐานข้อมูลมาใช้งาน
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'provinces';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [

    ];
}
