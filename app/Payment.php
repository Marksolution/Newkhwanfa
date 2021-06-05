<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    //เป็นการดึงตาราง payment ของฐานข้อมูลมาใช้งาน
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'payment';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        
        'user_id',
        'totalprice',
        'image',
        'status'
    ];
}