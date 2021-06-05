<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Product extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        //ฟิวล์ข้อมูลในตาราง product ที่ต้องการให้ส่งข้อมูลออกไปต้องเป็นข้อมูลที่จำเป็นและตรงกับแอพพลิเคชั่นที่ต้องการข้อมูลนั้น
        return parent::toArray($request);
        // return [
        //     'id' => $this->id,
        //     'type_id' => $this->type_id,
        //     'type_name' => $this->type_name,
        //     'shop_id' => $this->shop_id,
        //     'shop_name' => $this->shop_name,
        //     'product_name' => $this->product_name,
        //     'detail' => $this->detail,            
        //     'cost' => $this->cost,            
        //     'saleprice' => $this->saleprice,
        //     'status' => $this->status,
        // ];
    }
}
