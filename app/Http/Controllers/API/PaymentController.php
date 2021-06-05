<?php
   
   namespace App\Http\Controllers\API;
      
   use Illuminate\Http\Request;
   use App\Http\Controllers\API\BaseController as BaseController;
   use DB;
   use Validator;
   use App\Http\Resources\Payment as resource;
   
class PaymentController extends BaseController
{
    //เป็นการดึงข้อมูลจากตาราง payment มาใช้งานเพื่อส่งข้อมูลผ่าน postman ไปให้แอพพลิเคชั่นบนมือถือ

    public function index()//แสดงข้อมูลทั้งหมด
    {
        $payments = DB::table('payment')->get(); 
            
            return $this->sendResponse(resource::collection($payments), 'Payments retrieved successfully.');
    }
    public function show($id)//แสดงข้อมูลเฉพาะ id
    {        
        $payment = DB::table('payment')->where('id','=',$id)->first(); 
                
            if (!$payment) {
                return $this->sendError('Payment not found.');
            }
       
            return $this->sendResponse(new resource($payment), 'Payment retrieved successfully.');
    }
  
}
