<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Amphur extends Model
{
    //เป็นการดึงตาราง amphur ของฐานข้อมูลมาใช้งาน
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'amphurs';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        
    ];
}
