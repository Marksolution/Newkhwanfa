<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Producttype extends Model
{
    //เป็นการดึงตาราง producttype ของฐานข้อมูลมาใช้งาน
     /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'producttype';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'id'
    ];
}