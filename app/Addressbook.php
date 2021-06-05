<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Addressbook extends Model
{
    //เป็นการดึงตาราง addressbook ของฐานข้อมูลมาใช้งาน
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'addressbook';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'User_id','Address_id'
    ];
}
