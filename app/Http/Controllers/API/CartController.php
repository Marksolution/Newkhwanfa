<?php
   
   namespace App\Http\Controllers\API;
      
   use Illuminate\Http\Request;
   use App\Http\Controllers\API\BaseController as BaseController;
   use App\Cart;
   use Validator;
   use App\Http\Resources\Cart as resource;
      
   class CartController extends BaseController
   {
       //เป็นการดึงข้อมูลจากตาราง cart จอยกับตาราง product  มาใช้งานเพื่อส่งข้อมูลผ่าน postman ไปให้แอพพลิเคชั่นบนมือถือ
/**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()//แสดงข้อมูลทั้งหมด
    {
        $carts = Cart::select(
                'cart.id as cart_id',                
                'product.id as product_id',
                'product.name',
                'product.detail',
                'cart.amount',                
                'product.cost',
                'product.saleprice'
                )
                
                ->join('product','product.id','=','cart.product_id')
                ->get();      
            
            if ($carts->isEmpty()) {
                return $this->sendError('cart item not found.');
            }

            return $this->sendResponse(new resource($carts), 'cart item retrieved successfully.');
        }
    
   
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($userid)//แสดงข้อมูลเฉพาะ id
    {        
        $carts = Cart::select(
                'cart.id as cart_id',                
                'product.id as product_id',
                'product.name',
                'product.detail',
                'cart.amount',                
                'product.cost',
                'product.saleprice'
                )
                ->where('user_id', $userid)
                ->join('product','product.id','=','cart.product_id')
                ->get();      
            
            if ($carts->isEmpty()) {
                return $this->sendError('cart item not found.');
            }

            return $this->sendResponse(new resource($carts), 'cart item retrieved successfully.');
        }
  
        /**
         * Store a newly created resource in storage.
         *
         * @param  \Illuminate\Http\Request  $request
         * @return \Illuminate\Http\Response
         */
        public function store(Request $request)
        {
            $input = $request->all(); 
            
            dd($input);
            
            $validator = Validator::make($input, [
                'user_id' => 'required',
                'product_id' => 'required',
                'amount' => 'required'
            ]);
    
            if($validator->fails()){
                return $this->sendError('Validation Error.', $validator->errors());       
            }
    
            $product = Cart::create($input);
    
            return $this->sendResponse(new resource($product), 'Product created successfully.');
        } 
          
        /**
         * Update the specified resource in storage.
         *
         * @param  \Illuminate\Http\Request  $request
         * @param  int  $id
         * @return \Illuminate\Http\Response
         */
        public function update(Request $request, Product $product)
        {
            $input = $request->all();
    
            $validator = Validator::make($input, [
                'name' => 'required',
                'detail' => 'required'
            ]);
    
            if($validator->fails()){
                return $this->sendError('Validation Error.', $validator->errors());       
            }
    
            $product->name = $input['name'];
            $product->detail = $input['detail'];
            $product->save();
    
            return $this->sendResponse(new resource($product), 'Product updated successfully.');
        }
    
        /**
         * Remove the specified resource from storage.
         *
         * @param  int  $id
         * @return \Illuminate\Http\Response
         */
        public function destroy(Product $product)
        {
            $product->delete();
    
            return $this->sendResponse([], 'Product deleted successfully.');
        }
    }
