<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Stocklog extends Model
{
    //เป็นการดึงตาราง stocklog ของฐานข้อมูลมาใช้งาน
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'stocklog';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'product_id',
        'Billdetail_id',
        'amount'
    ];
}
