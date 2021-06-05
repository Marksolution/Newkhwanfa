<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product as product;
use App\Order as order;
use App\Shop as shop;
use App\Payment as payment;
use App\Paymentdetail as paymentdetail;
use App\Province as province;
use App\Amphure as amphure;
use App\District as district;
use App\Address as address;
use App\AddressShop as addressshop;
use App\Orderdetail as orderdetail;
use App\Producttype as producttype;
use Auth;
use DB;
use Carbon\Carbon;

class Shop_Controller extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
   
    public function shop_warehouse()
    {
        $data2 = product::join('producttype', 'producttype.id', '=', 'product.type_id')
        ->select('product.*','producttype.name as typename') 
        ->where('product.shop_id','=',Auth::id())->get();
        
        //get all product for shop

        
            //dd($data2->toArray());
        return view('shop_warehouse' , ['typename' => $data2]);
    }
    /**
     * display shop information to owner
     */
    public function newaddress(Request $req)
    {
        $data->address = $req->address1;
        $data->save();

        return redirect()->route('newshop'); 
        //view('/shop_warehouse' , ['products'=> array($products->toArray())]);
        
    }
    public function createnewshop(Request $req)
    {        
        $shop = new shop ; 
        $shop->name = $req->shopname;
        $shop->user_id = Auth::id();        

        $user_id = Auth::id();
        DB::transaction(function () use( $req, $user_id) {

            $addressshop = new addressshop;
            $addressshop->firstname = $req->firstname;
            $addressshop->lastname = $req->lastname;
            $addressshop->address = $req->address1;
            $addressshop->telephone = $req->telephone;        
            # int
            $addressshop->user_id = Auth::id(); 
            $addressshop->province_id =$req->province_id;//$req->provincename;
            $addressshop->district_id =$req->district_id;
            $addressshop->amphure_id =$req->amphure_id;//$req->districtname;
            $addressshop->postcode =$req->postcode;
            $addressshop->save();

            $shop = new shop ; 
            $shop->name = $req->shopname;
            $shop->user_id = $user_id;
            $shop->address_id = $addressshop->id;
            $shop->account_name = $req->account_name;
            $shop->account_number = $req->account_number;
            $shop->bank = $req->bank;
            $shop->save();

           
        });

        return redirect()->route('myshop');
    }

    function fetch(Request $request){
        $id=$request->get('select');
        $result=array();
        $query=DB::table('provinces')
        ->join('amphures','provinces.id','=','amphures.province_id')
        ->select('amphures.name_th')
        ->where('provinces.id',$id)
        ->groupBy('ampures.name_th')
        ->get();
        //dd($query);
        $output='<option value="">เลือกอำเภอของท่าน</option>';
        foreach($query as $row){
            $output.='<option value="'.$row->name_th.'">'.$row->name_th.'</option>';
        }
        echo $output;
    }
    public function myshop(Request $req)
    {   
        
        // get current shop_id
        $shop = DB::table("shop")
            ->select('id')
            ->where('user_id', Auth::id())
            ->first();
        
        if($shop == null)
        {
            
            //user hasn;t shop
            return view('createnewshop');

        }else{
            //use has shop
            $shopid = $shop->id;

                // get all product sale and total sale
            
            $products = DB::table('product')
                ->select('product.id as productid',
                    'product.type_id as producttype',
                    'product.name as productname',
                    'product.saleprice as productsaleprice',
                    DB::raw('SUM(orderdetail.quantity) AS quantity'),
                    DB::raw('SUM(orderdetail.total_price) AS totalprice'))
                ->where('product.shop_id', $shopid)            
                ->leftJoin('orderdetail','orderdetail.product_id','=','product.id')
                ->leftJoin('order','order.id','=','orderdetail.order_id')
                // select order only status = 2 (confirm order)
                ->where('order.status', 5)
                // group by product.id
                ->groupby('product.id')
                ->get();
            
                // get summary of sale value of month
                // $report = order::select(
                //     DB::raw('MONTH(order.updated_at) AS month'),
                //     DB::raw('SUM(order.tranfer) AS totalprice')
                // )
                // ->where('order.status', 5)
                //  
                // ->groupby(DB::raw('MONTH(order.updated_at)'))
                // ->get();
                // dd($report);
            //dd($this->reportconvert($report->toArray()), $report->toArray());
            $report = DB::table('product')
                ->select(
                    DB::raw('MONTH(order.updated_at) AS month'),
                    DB::raw('SUM(order.tranfer) AS totalprice')
                    // DB::raw('SUM(orderdetail.total_price) AS totalprice')
                )
                ->where('product.shop_id', $shopid)            
                ->leftJoin('orderdetail','orderdetail.product_id','=','product.id')
                ->leftJoin('order','order.id','=','orderdetail.order_id')
                // select order only status = 2 (confirm order)
                ->where('order.status', 5)
                // group by month
                ->groupby(DB::raw('MONTH(order.updated_at)'))
                ->get();
                //dd($report);
             //dd($this->reportconvert($report->toArray()), $report->toArray());
            
            $reportsummary = $this->reportconvert($report->toArray());
            $maxsale =  $this->getMax($report->toArray());
            $thismonth = $this->thismonth($reportsummary);
            $total = $this->total($reportsummary);

            return view('total_sales', 
                ['products'=> $products->toArray(), 
                'report' => $reportsummary, 
                'maxvalue' => $maxsale,
                'currentmonth' => $thismonth,
                'total' => $total,
                ]);
        }
    }
    /**
     * get sale value of current month
     */
    private function thismonth($array){
        $month = Carbon::now()->month;
        return $array[$month-1];
    }
    /**
     * get total sale of this year
     */
    private function total($array){
        $result = 0;
        foreach($array as $i){
            $result += $i;
        }
        return $result;
    }     
    /**
     * redata to array 12 slot of month
     */
    private function reportconvert( $array )
    {
        // $mountharray = array();
        // foreach($array as $val=>$subv){
        // $key = $subv['mounth'];
        // $mountharray[$val]=$key;
        // }
        $result = array();
        //dd($mountharray);
        for($i = 0 ; $i < 12; $i++){ 
            for($j = 0 ; $j < count($array); $j++){
                // dd($array[$j]);
                if($array[$j]->month == $i+1){
                    $result[$i] = $array[$j]->totalprice;       
                    break;
                }
                else{
                    if($i > $j)
                        continue;

                    $result[$i] = 0;                    
                    break;
                }
            }

            if(isset($result[$i]))
                continue;

            $result[$i] = 0; 
        }
        return $result;
    }
    /**
     * get max value of report to set maximum of graph
     */
    private function getMax( $array )
    {
        $max = 0; 
        if (is_array($array)) {    
            foreach($array as $val) {
                if($val->totalprice > $max)
                    $max = $val->totalprice;
            }
        }
        return $max;
    }
    public function new_product()
    {
        $type = DB::table('producttype')->get(); 
       // dd($type);
        return view('newproduct' , ["type" => $type->toArray()]);
    }
    
    public function index()
    {
        $shops = DB::table('shop')
            ->select('shop.id','shop.name as shopname','users.name as username')
            ->leftJoin('users','users.id','=','shop.user_id')
            ->get();
        
        return view('shop',['shops' => $shops->toArray()]);
    }
    public function detail($id)
    {
        $shops = DB::table('shop')
            ->select('shop.id','shop.name as shopname','users.name as username','users.email','users.phone')
            ->where('shop.id',$id)
            ->leftJoin('users','users.id','=','shop.user_id')
            ->first();
        return view('shopdetail',['data' => $shops]);
    }
   
   
    
    public function createnewproduct(Request $req)
    {
        
        $data = shop::where('shop.user_id', '=', Auth::id())
                    ->select('id')->first();
                    //dd($data->id);
        //print_r($req->input());
        $products = new product ; 
        $types = new producttype ;
        $products->name = $req->name;
        $products->type_id = $req->type_id;
        $products->Shop_id = $data->id;
        $products->cost = $req->cost;
        $products->datetosend = $req->datetosend;
        $products->weight = $req->weight;
        $products->detail = $req->detail;
        $products->amount = $req->amount;
        $products->amount2 = 1;
        $products->date = Carbon::now()->toDateTimeString();
        $path = $req->img_product->store('product','public');
        $products->img_product = $path;
        $products->save();
        //dd($products->toArray());
        //dd($products);
        

        return redirect()->route('shop'); //view('/shop_warehouse' , ['products'=> array($products->toArray())]);

    }
    public function edit(Request $req)
    {
        //print_r($req->input());
        $products = new product ; 
        $products->name = $req->name;
        $products->Type_id = $req->Type_id;
        $products->cost = $req->cost;
        //dd($products->toArray());
        $products->save();
        return view('edit', ['products'=> array($product->toArray())]);

    }
    public function editproduct($id)
    {
        //get product data form database -> where product_id = $id
        $product = product::where('product.id','=',$id)->get();
        $type = DB::table('producttype')->get(); 
        return view('edit_product', ['item'=> $product->toArray(),'type'=> $type->toArray()]);
    }
        
    public function update_edit(Request $req )
    {
       
        $data = shop::where('shop.user_id', '=', Auth::id())
        ->select('id')->first();
        //dd($req->file('img_promotion'));
        if ($req->file('img_product') != null) {
            // $req->remove('img_product');
            $path = $req->file('img_product')->store('product', 'public'); #file('img_promotion')->store('images','promotion_image');//->store('promotion', 'public');
            // dd($path);
            $img_product = $path;
            product::where('id', '=', $req->id)->update(
                array(
                    
                    'name' => $req->name,
                    'type_id' => $req->type_id,
                    'shop_id' => $data->id,
                    'cost' => $req->cost,
                    'detail' => $req->detail,
                    'amount' => $req->amount,
                    'date' => $req->date = Carbon::now()->toDateTimeString(),
                    'img_product' =>$img_product
                    
                )
            );
        } else {
            product::where('id', '=', $req->id)->update(
                array(
                    'name' => $req->name,
                    'type_id' => $req->type_id,
                    'shop_id' => $data->id,
                    'cost' => $req->cost,
                    'detail' => $req->detail,
                    'amount' => $req->amount,
                    'date' => $req->date = Carbon::now()->toDateTimeString()
                    
                )
            );
        }

        return redirect()->route('shop');

    }

    public function delete($id)
    {
        //dd($product);
       
        product::where('id','=',$id)->delete();
        return redirect()->route('shop');
        
       
    }
    
    public function clearmoney()
    {
        $results = DB::table('orderdetail')
        ->select('orderdetail.order_id',
            'order.tracking_number',
            'users.name as username',
            'order.status as orderstatus',
            
            'order.created_at',
            'order.updated_at')
        
        ->leftjoin('order','order.id','=','orderdetail.order_id')
        ->leftjoin('product','product.id','=','orderdetail.product_id')
        ->leftjoin('shop','shop.id','=','product.shop_id')
        ->leftjoin('users','users.id','=','order.user_id')
        
        ->where('shop.user_id','=',Auth::id())
        ->groupBy('order_id')
        ->get();
            //dd($results);
        
        $data2 = order::join('users','users.id','=','order.user_id')
        ->join('address','address.id','=','order.address_id')
        ->join('shop','shop.id','=','order.shop_id')
        ->select('order.*','shop.name as shopname'
        ,'address.firstname as firstname'
        ,'shop.account_number as account_number'
        ,'shop.bank as bank'
        ,'order.total_price as total_price'
        ,'order.address_id as addres_id'
        ,'order.shipping_cost as shippingcost')
        ->get();
        
        $payment = payment::
        join('users','users.id','=','payment.user_id')
        ->select('payment.*','payment.status as paymentstatus' ,'users.name as nameuser' ,'users.phone as phone')
        ->get();
       
        // dd($payment);
        $data = paymentdetail::join('order','order.id','=','paymentdetail.order_id')
        ->join('payment','payment.id','=','paymentdetail.payment_id')
        ->join('product','product.id','=','paymentdetail.product_id')
        ->select('paymentdetail.*',
                 'payment.id as payment_id',
                 'paymentdetail.order_id as order_id',
                 'paymentdetail.id as paymentdetail_id',
                 'payment.totalprice as totalprice',
                 'payment.image as image',
                 'product.name as productname')
      
        ->first();

        return view('clearmoney',['paymentdetails' => $data,'data' => $results->toArray(),'data2' => $data2->toArray(),'payment' => $payment->toArray()]);
    }
   
    public function detailclearmoney($id)
    {

        $data = paymentdetail::join('order','order.id','=','paymentdetail.order_id')
        ->join('payment','payment.id','=','paymentdetail.payment_id')
        ->join('product','product.id','=','paymentdetail.product_id')
        ->select('paymentdetail.*',
                 'payment.id as payment_id',
                 'payment.status as paymentstatus',
                 'paymentdetail.order_id as order_id',
                 'paymentdetail.id as paymentdetail_id',
                 'payment.totalprice as totalprice',
                 'payment.image as image',
                 'product.name as productname')
        ->where('payment_id',$id)
        ->first();

        $data2 = paymentdetail::join('order','order.id','=','paymentdetail.order_id')
        ->join('payment','payment.id','=','paymentdetail.payment_id')
        ->join('product','product.id','=','paymentdetail.product_id')
        ->select('paymentdetail.*',
                 'payment.id as payment_id',
                 'paymentdetail.order_id as order_id',
                 'paymentdetail.id as paymentdetail_id',
                 'payment.totalprice as totalprice',
                 'order.shipping_cost as shipping_cost',
                 'payment.image as image',
                 'product.name as productname',
                 'product.cost as cost')
        ->where('payment_id',$id)
        ->get();
        //dd($data2);
        $value = array();
        $no = array();
        $total = 0;
        $pow = 0;

        foreach($data2 as $item){
            $cost = $item['cost'];
            $ship = $item['shipping_cost'];
            $total = $total+$ship;
            $pow = $pow+$cost;
            $value=$total;
            $no=$pow;
        }
       //dd($no);
        $payment2 = payment::
        join('users','users.id','=','payment.user_id')
        ->select('payment.*','payment.status as paymentstatus' ,'users.name as nameuser')
        ->get();
        //dd($data);
     
        $orderdetail = DB::table('orderdetail')
            ->select('orderdetail.id as id',
                'product.id as productid',
                'product.name as productname',
                'product.detail as productdetail',
                'product.cost as productcost',
                'orderdetail.quantity as quantity',
                'orderdetail.created_at as created_at',
                'orderdetail.updated_at as updated_at')
            ->where('order_id',$id)
            ->leftJoin('product','product.id','=','orderdetail.product_id')
            ->get();

        $payment = DB::table('payment')->first();
      
        //dd($payment);
        return view('detailclearmoney', 
            ['orderdetails'=> $orderdetail->toArray(),
            'value'=>$value,
            'no'=>$no,
                'payment'=>$payment,
                'data'=>$data,
                'data2'=>$data2,
                'payment2'=>$payment2 ]);
        
    }
    public function addminclearmoney($id)
    {

        $data = paymentdetail::join('order','order.id','=','paymentdetail.order_id')
        ->join('payment','payment.id','=','paymentdetail.payment_id')
        ->join('product','product.id','=','paymentdetail.product_id')
        ->join('shop','shop.id','=','paymentdetail.shop_id')
        ->select('paymentdetail.*',
                 'shop.name as shopname',
                 'shop.account_name as account_name',
                 'shop.account_number as account_number',
                 'shop.name as nameshop',
                 'shop.bank as bank',
                 'order.total_price as total_price',
                 'payment.id as payment_id',
                 'payment.status as paymentstatus',
                 'paymentdetail.order_id as order_id',
                 'paymentdetail.id as paymentdetail_id',
                 'payment.totalprice as totalprice',
                 'payment.image as image',
                 'product.name as productname')
        ->where('payment_id',$id)
        ->first();

        $data2 = paymentdetail::join('order','order.id','=','paymentdetail.order_id')
        ->join('payment','payment.id','=','paymentdetail.payment_id')
        ->join('shop','shop.id','=','paymentdetail.shop_id')
        ->join('product','product.id','=','paymentdetail.product_id')
        ->select('paymentdetail.*',
        'shop.name as shopname',
        'shop.account_name as account_name',
        'shop.account_number as account_number',
        'shop.name as nameshop',
        'shop.bank as bank',
        'order.total_price as total_price',
        'payment.id as payment_id',
        'payment.status as paymentstatus',
        'paymentdetail.order_id as order_id',
        'paymentdetail.id as paymentdetail_id',
        'payment.totalprice as totalprice',
        'payment.image as image',
        'product.name as productname')
        ->where('payment_id',$id)
        ->get();
        //dd($data2);
        // foreach($data2 as $val){

        // }
        // $ordershop = paymentdetail::select('paymentdetail.*','shop.name as shopname','shop.account_name as account_name','shop.account_number as account_number','shop.name as nameshop')
        // ->join('order','order.id','=','paymentdetail.order_id')
        // ->get();
        $payment2 = payment::
        join('users','users.id','=','payment.user_id')
        ->select('payment.*','payment.status as paymentstatus' ,'users.name as nameuser')
        ->get();
        //dd($data);
        
        $orderdetail = DB::table('orderdetail')
            ->select('orderdetail.id as id',
                'product.id as productid',
                'product.name as productname',
                'product.detail as productdetail',
                'product.cost as productcost',
                'orderdetail.quantity as quantity',
                'orderdetail.created_at as created_at',
                'orderdetail.updated_at as updated_at')
            ->where('order_id',$id)
            ->leftJoin('product','product.id','=','orderdetail.product_id')
            ->get();

        $payment = DB::table('payment')->first();
      
        //dd($payment);
        return view('addminclearmoney', 
            ['orderdetails'=> $orderdetail->toArray(),
                
                'payment'=>$payment,
                'data'=>$data,
                'data2'=>$data2,
                'payment2'=>$payment2 ]);
        
    }
    public function tranfermoney(Request $req)
    {
        $id = $req->id;
        $payment=payment::where('id', '=', $id)->update(
            array(
                'status' =>  $req->status,
            )
        );
        
        $data2 = paymentdetail::join('order','order.id','=','paymentdetail.order_id')
        ->join('payment','payment.id','=','paymentdetail.payment_id')
        ->join('shop','shop.id','=','paymentdetail.shop_id')
        ->join('product','product.id','=','paymentdetail.product_id')
        ->select('paymentdetail.*',
        'shop.name as shopname',
        'shop.account_name as account_name',
        'shop.account_number as account_number',
        'shop.name as nameshop',
        'shop.bank as bank',
        'order.total_price as total_price',
        'payment.id as payment_id',
        'payment.status as paymentstatus',
        'paymentdetail.order_id as order_id',
        'paymentdetail.id as paymentdetail_id',
        'payment.totalprice as totalprice',
        'payment.image as image',
        'product.name as productname')
        ->where('payment_id',$id)
        ->get();
        //dd($data2);
        $order2=order::
        select('order.*','order.status as orderstatus')
        ->where('id', '=', $id)
        ->get();
        //dd($order);
        $order = order::where('id', '=', $id)->get();
        
        foreach( $data2 as $item){
            $tranfer = ($item['total_price']*3)/100;
            $val = $item['total_price']-$tranfer;
        order::where('id', '=', $item['order_id'])->update(
        array(
            'tranfer'=>  $val,
            'status' =>  5,
        ));
        }
        return redirect('/clearmoney');
    }

    public function getcostproduct($req){
        $product_id = $req;

        return redirect('/newpromotion');
    }
}