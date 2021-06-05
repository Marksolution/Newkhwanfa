<?php
   
   namespace App\Http\Controllers\API;
      
   use Illuminate\Http\Request;
   use App\Http\Controllers\API\BaseController as BaseController;
   use DB;
   use Validator;
   use App\Http\Resources\Promotion as resource;
   class PromotionController extends BaseController
   {
       //เป็นการดึงข้อมูลจากตาราง promotion มาใช้งานเพื่อส่งข้อมูลผ่าน postman ไปให้แอพพลิเคชั่นบนมือถือ
    public function index()//แสดงข้อมูลทั้งหมด
    {
        $promotions = DB::table('promotion')->get(); 
            
            return $this->sendResponse(resource::collection($promotions), 'Promotions retrieved successfully.');
    }
    public function show($id)//แสดงข้อมูลเฉพาะ id
    {        
        $promotion = DB::table('promotion')->where('id','=',$id)->first(); 
                
            if (!$promotion) {
                return $this->sendError('Promotion not found.');
            }
       
            return $this->sendResponse(new resource($promotion), 'Promotion retrieved successfully.');
    }
  
}