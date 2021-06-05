<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Productimage extends Model
{
    //เป็นการดึงตาราง productimage ของฐานข้อมูลมาใช้งาน
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'productimage';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'filename', 'product_id'
    ];
}
