<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    //เป็นการดึงตาราง address ของฐานข้อมูลมาใช้งาน
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'address';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'address_name',
        'address',
        'user_id',
        'address2',
        'status',
        'province_id',
        'district_id',
        'amphure_id',
        'postcode',
        'firstname',
        'lastname',
        'telephone'
    ];
}