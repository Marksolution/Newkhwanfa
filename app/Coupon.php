<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Coupon extends Model
{
    //
    protected $table = 'coupon';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id',
        'code_coupon',
        'name_coupon',
        'detail_coupon',
        'minimum',
        'startdate',
        'enddate',
        'discount',
        'status'
        
    ];
}
