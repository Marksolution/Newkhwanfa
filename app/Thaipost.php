<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Thaipost extends Model
{
    
     /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'thaipost';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'weight', 'cost'
    ];
}
