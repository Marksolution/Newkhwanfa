<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Shop extends Model
{
    //เป็นการดึงตาราง shop ของฐานข้อมูลมาใช้งาน
   /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'shop';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'User_id', 'name', 'address_id', 'account_number', 'account_name','bank', 'user_id'
    ];
}
