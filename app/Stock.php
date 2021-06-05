<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Stock extends Model
{
    //เป็นการดึงตาราง stock ของฐานข้อมูลมาใช้งาน
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'stock';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'product_id',
        'balance'
    ];
}
