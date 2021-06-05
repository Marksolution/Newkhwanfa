<?php
   
namespace App\Http\Controllers\API;
   
use Illuminate\Http\Request;
use App\Http\Controllers\API\BaseController as BaseController;
use App\Product;
use Validator;
use App\Http\Resources\Product as resource;
   
class ProductController extends BaseController
{
    //เป็นการดึงข้อมูลจากตาราง product จอยกับตาราง shop มาใช้งานเพื่อส่งข้อมูลผ่าน postman ไปให้แอพพลิเคชั่นบนมือถือ
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()//แสดงข้อมูลทั้งหมด
    {
        $products = Product::select(
                            'product.id as id',
                            'product.name as product_name',
                            'product.detail as product_detail',
                            'type_id',
                            'producttype.name as type_name',
                            'shop.id as shop_id',
                            'shop.name as shop_name',                                                        
                            'product.cost',
                            'product.status',            
                            'product.saleprice',
                            'productimage.filename as imagename'
                        )
                        ->leftJoin('shop','shop.id','=','product.id')
                        ->leftJoin('producttype','producttype.id','=','product.type_id')
                        ->leftJoin('productimage','productimage.product_id','=','product.id')
                        ->get();       
        
        return $this->sendResponse(resource::collection($products), 'Products retrieved successfully.');
    }
    
   
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)//แสดงข้อมูลเฉพาะ id
    {        
        $product = Product::find($id)
                    ->select(
                        'product.id as id',
                        'product.name as product_name',
                        'product.detail as product_detail',
                        'type_id',
                        'producttype.name as type_name',
                        'shop.id as shop_id',
                        'shop.name as shop_name',                                                        
                        'product.cost',
                        'product.status',            
                        'product.saleprice',
                        'productimage.filename as imagename'
                    )
                    ->leftJoin('shop','shop.id','=','product.id')
                    ->leftJoin('producttype','producttype.id','=','product.type_id')
                    ->leftJoin('productimage','productimage.product_id','=','product.id')
                    ->first(); 
            
        if (!$product) {
            return $this->sendError('Product not found.');
        }
   
        return $this->sendResponse(new resource($product), 'Product retrieved successfully.');
    }
  
}
