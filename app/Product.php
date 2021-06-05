<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    //เป็นการดึงตาราง product ของฐานข้อมูลมาใช้งาน
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'product';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'type_id','shop_id','name', 'detail','amount','amount2','cost','datetosend','status','date','rating','saleprice'
    ];
}