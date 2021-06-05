<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class District extends Model
{
    //เป็นการดึงตาราง district ของฐานข้อมูลมาใช้งาน
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'districts';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        
    ];
}
