<?php
   
   namespace App\Http\Controllers\API;
      
   use Illuminate\Http\Request;
   use App\Http\Controllers\API\BaseController as BaseController;
   use DB;
   use Validator;
   use App\Http\Resources\Address as resource;
      
   class AddressController extends BaseController
   {
       //เป็นการดึงข้อมูลจากตาราง address มาใช้งานเพื่อส่งข้อมูลผ่าน postman ไปให้แอพพลิเคชั่นบนมือถือ
/**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()//แสดงข้อมูลทั้งหมด
    {
        $address = DB::table('address')->get(); 
            
            return $this->sendResponse(resource::collection($address), 'Address retrieved successfully.');
    }
    public function show($id)//แสดงข้อมูลเฉพาะ id
    {        
        $addresss = DB::table('address')->where('id','=',$id)->first(); 
                
            if (!$addresss) {
                return $this->sendError('Address not found.');
            }
       
            return $this->sendResponse(new resource($addresss), 'Address retrieved successfully.');
    }
  
}