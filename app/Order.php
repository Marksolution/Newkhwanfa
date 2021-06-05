<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    //เป็นการดึงตาราง order ของฐานข้อมูลมาใช้งาน
     /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'order';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id',         
        'total_price',
        'address_id',
        'tracking_number',
        'shipping_cost',
        'code_coupon',
        'shop_id',
        'status'
    ];
}
