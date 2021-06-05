<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Paymentdetail extends Model
{
    
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'paymentdetail';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'payment_id','order_id','product_id','shop_id'
    ];
}