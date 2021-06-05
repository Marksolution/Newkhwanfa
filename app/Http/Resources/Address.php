<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Address extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        //ฟิวล์ข้อมูลในตาราง address ที่ต้องการให้ส่งข้อมูลออกไปต้องเป็นข้อมูลที่จำเป็นและตรงกับแอพพลิเคชั่นที่ต้องการข้อมูลนั้น
        //return parent::toArray($request);
        return [
            'id' => $this->id,
            'address_name' => $this->address_name,
            'address' => $this->address,
            'address2' => $this->address2,
            'province_id' => $this->province_id,
            'district_id' => $this->district_id,
            'firstname' => $this->firstname,
            'lastname' => $this->lastname,
            'telephone' => $this->telephone,
            
        ];
    }
}
