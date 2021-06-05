<?php
   
   namespace App\Http\Controllers\API;
      
   use Illuminate\Http\Request;
   use App\Http\Controllers\API\BaseController as BaseController;
   use DB;
   use Validator;
   use App\Http\Resources\Personal as resource;
   
class PersonalController extends BaseController
{
    //เป็นการดึงข้อมูลจากตาราง users มาใช้งานเพื่อส่งข้อมูลผ่าน postman ไปให้แอพพลิเคชั่นบนมือถือ

    public function index()//แสดงข้อมูลทั้งหมด
    {
        $personals = DB::table('users')->get(); 
            
            return $this->sendResponse(resource::collection($personals), 'Personals retrieved successfully.');
    }
    public function show($id)//แสดงข้อมูลเฉพาะ id
    {        
        $personal = DB::table('users')->where('id','=',$id)->first(); 
                
            if (!$personal) {
                return $this->sendError('Personal not found.');
            }
       
            return $this->sendResponse(new resource($personal), 'Personal retrieved successfully.');
    }
  
}
