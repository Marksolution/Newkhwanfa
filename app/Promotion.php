<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Promotion extends Model
{
    //เป็นการดึงตาราง promotion ของฐานข้อมูลมาใช้งาน
     /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'promotion';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'product_id',
        'detail',
        'amount',
        'promotion_price',
        'startdate',
        'enddate'
    ];
}