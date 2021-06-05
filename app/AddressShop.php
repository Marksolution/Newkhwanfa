<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AddressShop extends Model
{
    protected $table = 'address_shop';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        
        'address',
        'user_id',
        'province_id',
        'district_id',
        'amphure_id',
        'firstname',
        'lastname',
        'telephone'
    ];
}
