<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Personal extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        //ฟิวล์ข้อมูลในตาราง personal ที่ต้องการให้ส่งข้อมูลออกไปต้องเป็นข้อมูลที่จำเป็นและตรงกับแอพพลิเคชั่นที่ต้องการข้อมูลนั้น
        //return parent::toArray($request);
        return [
            'id' => $this->id,
            'name' => $this->name,
            'email' => $this->email,
            'phone' => $this->phone,
            'role' => $this->role,
        
        ];
    }
}