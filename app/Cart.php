<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    //เป็นการดึงตาราง cart ของฐานข้อมูลมาใช้งาน
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'cart';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id',         
        'shop_id',
        'shop_name',
        'product_id',
       
        'productname',
        'detail',
        'weight',
        'cost',
        'shippingcost',
        'amount'

    ];
}