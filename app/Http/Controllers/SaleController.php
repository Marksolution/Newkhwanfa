<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product as product;
use App\Order as order;
use App\Shop as shop;
use App\Cart as cart;
use App\Payment as payment;
use App\Promotion as promotion;
use App\Review as review;
use App\Paymentdetail as paymentdetail;
use App\Province as province;
use App\Amphure as amphure;

use App\District as district;
use App\Address as address;
use App\Orderdetail as orderdetail;
use App\Producttype as producttype;
use Auth;
use DB;
use Carbon\Carbon;

class SaleController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     * public function __construct()
     *{
       * $this->middleware('auth');
    *}
     */

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
   
    /**
     * display shop information to owner
     */
    
    //หน้าแสดงสินค้า
    public function first_data()
    {
        $cart = cart::where('cart.user_id','=',Auth::id())->get();
        $types = producttype::all();
        $data = DB::table("product")->get();
        $pro2 = DB::table("promotion")->get();
        $pro = promotion::join('product', 'product.id', '=', 'promotion.product_id')
        ->select('promotion.*','product.cost as costproduct','product.name as productname','product.weight as weightpro','product.amount as amountpro')
        ->limit(6)
        ->get();
       
        $notsale = product::
        join('shop', 'shop.id', '=', 'product.shop_id')
        ->leftjoin('promotion', 'product.id', '=', 'promotion.product_id')
        ->whereNull('promotion.id')->select('product.*' ,'product.amount2 as amount2')
        ->where('shop.user_id','=',Auth::id())
        ->get();
        //dd($notsale );

        //dd($pro->toArray());
        $notproduct = product::
        join('shop', 'shop.id', '=', 'product.shop_id')
        ->leftjoin('promotion', 'product.id', '=', 'promotion.product_id')
        ->whereNull('promotion.id')->select('product.*' ,'product.amount2 as amount2')
       
        ->get();
        //สินค้าทำโปรโมชันแล้วไม่ต้องแสดงสินค้าทั่วไป
        // dd($notproduct->toArray());
        $newpro = array();
        $ship = 0;
        $ships = 0;
        foreach($notproduct as $val){
            //echo($val['nameshop']);
            $val->shippingcost = $this->calWeghtCost($val->weight);
            $weight = $val['weight'];
            $amount2 = $val['amount2'];
            $val['weighttotal'] =($weight * $amount2);
            $p= $val['weighttotal'];
            if($p >= 20 && $p<=100) { $ships=32; } elseif($p>=100
            && $p<= 250) { $ships=37; } elseif($p>=250 && $p
                <=499) { $ships=42; } elseif($p>=500 && $p<= 999) { $ships=52;
                        } elseif($p>=1000 &&
                        $p<= 1499) { $ships=67; } elseif($p>=1500 && $p
                            <= 1999) { $ships=82; } elseif($p>=2000 &&
                                $p<= 2499) { $ships=97; }elseif($p>=2500 &&
                                    $p<= 2999) { $ships=122; } elseif($p>=3000
                                        && $p<= 3499) { $ships=132; }
                                            elseif($p>=3500 && $p<= 3999) {
                                                $ships=142; }elseif($p>=4000
                                                && $p<= 4499) { $ships=152;
                                                    }elseif($p>=4500 &&
                                                    $p<= 4999) { $ships=162; }
                                                    elseif($p>=5000 &&
                                                    $p<= 5499) { $ships=172; }
                                                    elseif($p>=5500 &&
                                                    $p<= 5999) { $ships=192; }
                                                    elseif($p>=6000 &&
                                                    $p<= 6499) { $ships=212; }
                                                    elseif($p>=6500 &&
                                                    $p<= 6999) { $ships=232; }
                                                    elseif($p>=7000 &&
                                                    $p<= 7499) { $ships=252; }
                                                    elseif($p>=7500 &&
                                                    $p<= 7999) { $ships=272; }
                                                    elseif($p>=8000 &&
                                                    $p<= 8499) { $ships=292; }
                                                    elseif($p>=8500 &&
                                                    $p<= 8999) { $ships=312; }
                                                    elseif($p>=9000 &&
                                                    $p<= 9499) { $ships=332; }
                                                    elseif($p>=9500 &&
                                                    $p<= 9999) { $ships=352; }
                                                    elseif($p>=10000 &&
                                                    $p<= 10999) { $ships=372; }
                                                    elseif($p>=11000 &&
                                                    $p<= 11999) { $ships=452; }
                                                    elseif($p>=12000 &&
                                                    $p<= 12999) { $ships=492; }
                                                    else{} 
                                                        $ship =($ship + $ships);
            $val['calweighttotal'] = $ships;
        }
        //dd($notproduct);
        return view('first',['notsale' =>$notsale,'dataproduct' => $data->toArray(),'datapromotion' => $pro,'notproduct' => $notproduct,'type'=> $types->toArray(),'cart'=>$cart] ); 
        
        
    }
    public function calWeghtCost($weight){
        $ship = 0;
        $ships = 0;
        $ships = 0;
        $p=$weight;
        //dd($weight);
        if($p >= 20 && $p<=100) { $ships=32; } elseif($p>=100
            && $p<= 250) { $ships=37; } elseif($p>=250 && $p
                <=499) { $ships=42; } elseif($p>=500 && $p<= 999) { $ships=52;
                        } elseif($p>=1000 &&
                        $p<= 1499) { $ships=67; } elseif($p>=1500 && $p
                            <= 1999) { $ships=82; } elseif($p>=2000 &&
                                $p<= 2499) { $ships=97; }elseif($p>=2500 &&
                                    $p<= 2999) { $ships=122; } elseif($p>=3000
                                        && $p<= 3499) { $ships=132; }
                                            elseif($p>=3500 && $p<= 3999) {
                                                $ships=142; }elseif($p>=4000
                                                && $p<= 4499) { $ships=152;
                                                    }elseif($p>=4500 &&
                                                    $p
                                                    <= 4999) { $ships=162; }
                                                        else{} 
                                                        $ship =
                                                        ($ship + $ships);
                                                        
        return $ships;
    }
    public function viewpromotion()
    {
        $cart = cart::where('cart.user_id','=',Auth::id())->get();
        $types = producttype::all();
        $data = DB::table("product")->get();
        $types = producttype::all();
        $pro2 = DB::table("promotion")->get();
        $pro = promotion::join('product', 'product.id', '=', 'promotion.product_id')
        ->select('promotion.*','product.cost as costproduct','product.name as productname','product.datetosend as datetosend','product.weight as weightpro','product.amount as amountpro')
        ->get();
        //dd($pro->toArray());
        return view('viewpro',['costpro' => $pro,'datapro' => $pro2->toArray(),'type'=>$types->toArray(),'type'=> $types->toArray(),'cart'=>$cart]); 
        
    }
    public function viewtype($id)
    {
        $cart = cart::where('cart.user_id','=',Auth::id())->get();
        $types = producttype::all();
       
        $data = DB::table("product")->select('product.*','product.type_id as typename')
        ->where('product.type_id','=', $id)->get();
        //dd($data->toArray());
        $pro = promotion::join('product', 'product.id', '=', 'promotion.product_id')
        ->select('promotion.*','product.cost as costproduct','product.name as productname','product.weight as weightpro','product.amount as amountpro')
        ->where('product.type_id','=', $id)->get();
        $notproduct = product::
        leftjoin('promotion', 'product.id', '=', 'promotion.product_id')
        ->whereNull('promotion.id')->select('product.*' ,'product.amount2 as amount2')
        ->where('product.type_id','=', $id)->get();
      
        //สินค้าทำโปรโมชันแล้วไม่ต้องแสดงสินค้าทั่วไป
        // dd($notproduct->toArray());
        $newpro = array();
        $ship = 0;
        $ships = 0;
        foreach($notproduct as $val){
            //echo($val['nameshop']);
            $val->shippingcost = $this->calWeghtCost($val->weight);
            $weight = $val['weight'];
            $amount2 = $val['amount2'];
            $val['weighttotal'] =($weight * $amount2);
            $p= $val['weighttotal'];
            if($p >= 20 && $p<=100) { $ships=32; } elseif($p>=100
            && $p<= 250) { $ships=37; } elseif($p>=250 && $p
                <=499) { $ships=42; } elseif($p>=500 && $p<= 999) { $ships=52;
                        } elseif($p>=1000 &&
                        $p<= 1499) { $ships=67; } elseif($p>=1500 && $p
                            <= 1999) { $ships=82; } elseif($p>=2000 &&
                                $p<= 2499) { $ships=97; }elseif($p>=2500 &&
                                    $p<= 2999) { $ships=122; } elseif($p>=3000
                                        && $p<= 3499) { $ships=132; }
                                            elseif($p>=3500 && $p<= 3999) {
                                                $ships=142; }elseif($p>=4000
                                                && $p<= 4499) { $ships=152;
                                                    }elseif($p>=4500 &&
                                                    $p<= 4999) { $ships=162; }
                                                    elseif($p>=5000 &&
                                                    $p<= 5499) { $ships=172; }
                                                    elseif($p>=5500 &&
                                                    $p<= 5999) { $ships=192; }
                                                    elseif($p>=6000 &&
                                                    $p<= 6499) { $ships=212; }
                                                    elseif($p>=6500 &&
                                                    $p<= 6999) { $ships=232; }
                                                    elseif($p>=7000 &&
                                                    $p<= 7499) { $ships=252; }
                                                    elseif($p>=7500 &&
                                                    $p<= 7999) { $ships=272; }
                                                    elseif($p>=8000 &&
                                                    $p<= 8499) { $ships=292; }
                                                    elseif($p>=8500 &&
                                                    $p<= 8999) { $ships=312; }
                                                    elseif($p>=9000 &&
                                                    $p<= 9499) { $ships=332; }
                                                    elseif($p>=9500 &&
                                                    $p<= 9999) { $ships=352; }
                                                    elseif($p>=10000 &&
                                                    $p<= 10999) { $ships=372; }
                                                    elseif($p>=11000 &&
                                                    $p<= 11999) { $ships=452; }
                                                    elseif($p>=12000 &&
                                                    $p<= 12999) { $ships=492; }
                                                    else{} 
                                                        $ship =($ship + $ships);
            $val['calweighttotal'] = $ships;
            }
        return view('viewtype',['notproduct' => $notproduct,'datapromotion' => $pro,'dataproduct' => $data->toArray(),'type'=> $types->toArray(),'cart'=>$cart]);

    }
    //รายละเอียดสินค้า
    public function detailproduct($id)
    {
        $reviewproduct=orderdetail::select('orderdetail.id as orderdetailid','orderdetail.product_id as product_id','order.status as orderstatus','order.user_id as user_id')
        ->join('order','orderdetail.order_id','=','order.id')
        ->join('product','orderdetail.product_id','=','product.id')
        ->where('user_id','=',Auth::id())
        ->where('product_id','=',$id)
        ->get();

        $canreview = review::
        join('product','review.product_id','=','product.id')
        ->where('product_id','=',$id)
        ->get();
        //dd($reviewproduct);
        
        $cart = cart::where('cart.user_id','=',Auth::id())->get();
        $types = producttype::all();
        $data2 = review::join('users', 'users.id', '=', 'review.user_id')->select('review.*','users.name as username')
        ->where('review.product_id','=', $id)
        ->get();
        
        $data = product::where('product.id','=',$id)->select('product.*')
        ->get();
        //dd($data);
       
        
        $newpro = array();
        foreach($data as $val){
            //echo($val['nameshop']);
            $val->shippingcost = $this->calWeghtCost($val->weight);
        }
        //dd();
        //dd($data->toArray());
        return view('detailproduct',['canreview'=>$canreview,'productid'=>product::where('product.id','=',$id)->first(),'item' => $data,'item2' => $data,'item3' => $data2,'type'=>$types->toArray(),'cart'=>$cart,'reviewproduct'=> $reviewproduct]);
        
    }
    
    public function detailpromotion($id)
    {
        $pro = promotion::join('product', 'product.id', '=', 'promotion.product_id')
        ->select('promotion.*','product.cost as costproduct','product.detail as productdetail',
        'product.datetosend as datetosend','product.name as productname','product.weight as weightpro','product.amount as amountpro','product.id as proid','product.shop_id as shop_id')
        ->where('promotion.id','=', $id)
        ->get();
        $pro2 = promotion::join('product', 'product.id', '=', 'promotion.product_id')
        ->select('promotion.*','product.cost as costproduct','product.detail as productdetail',
        'product.datetosend as datetosend','product.name as productname','product.weight as weightpro','product.amount as amountpro','product.id as proid','product.shop_id as shop_id')
        ->where('promotion.id','=', $id)
        ->first();
        //dd($pro2);
         $proid = $pro2['product_id'];
         //dd($proid);
        $reviewproduct=orderdetail::select('orderdetail.id as orderdetailid','orderdetail.product_id as product_id','order.status as orderstatus','order.user_id as user_id')
        ->join('order','orderdetail.order_id','=','order.id')
        ->join('product','orderdetail.product_id','=','product.id')
        ->where('user_id','=',Auth::id())
        ->where('product_id','=',$proid)
        ->get();
        //dd($reviewproduct);
        $canreview = review::
        join('product','review.product_id','=','product.id')
        ->where('product_id','=',$proid)
        ->get();
        //dd($canreview);

       
        $cart = cart::where('cart.user_id','=',Auth::id())->get();
        $types = producttype::all();

        $proid=promotion::where('promotion.id','=', $id)
        ->join('product','promotion.product_id','=','product.id')
        ->select('promotion.*','product.id as productid')
        ->first();
        //dd($proid);
        $data2 = review::join('users', 'users.id', '=', 'review.user_id')->select('review.*','users.name as username')
                    ->where('review.product_id','=', $proid->product_id)
                    ->get();
                    //dd($data2);
            $data = product::get();
       //dd($data->toArray());
        return view('detailpromotion',['canreview'=>$canreview,'productid'=>$proid,'reviewproduct'=> $reviewproduct,'item' => $pro,'item2' => $data->first(),'item3' => $data2,'pro' => $pro->toArray(),'type'=>$types->toArray(),'cart'=>$cart]);
    }
    //ส่งข้อมูลไปตะกร้าสินค้า
   
    public function loginbackend()
    {
        
        return view('loginbackend' );
    }
    public function guidebook()
    {
        $cart = cart::where('cart.user_id','=',Auth::id())->get();
        $types = producttype::all();
        return view('guidebook' ,['type'=> $types->toArray(),'cart'=>$cart]);
    }

    public function reviewpro(Request $req)
    {
        
        $reviews = new review ;
        $reviews->user_id = Auth::id();
        //dd($req->all());
        $reviews->product_id = $req->product_id;
        $reviews->text = $req->text;
        $reviews->rating = $req->rating;
        $reviews->date = Carbon::now()->toDateTimeString();
        $reviews->save();

        //dd($reviews);
        return redirect()->route('detailproduct', ['id'=>$reviews->product_id]) ;
        
        
    }

    public function tracking()
    {
        $cart = cart::where('cart.user_id','=',Auth::id())->get();
        $types = producttype::all();
        $order = orderdetail::join('order','order.id','=','orderdetail.order_id')
        ->join('product','product.id','=','orderdetail.product_id')
        ->select('orderdetail.*','order.user_id as user_id',
        'order.shop_id as shop_id','product.name as name','order.tracking_number as tracking_number')
        ->where('user_id', Auth::id())
        ->get();
        $payment = payment::join('users','users.id','=','payment.user_id')
        ->select('payment.*','payment.status as paymentstatus' ,'users.name as nameuser')
        ->get();
        $m = order::join('shop','shop.id','=','order.shop_id')
        ->select('order.*','shop.name as shopname')
        ->get();

        $data2 = paymentdetail::join('order','order.id','=','paymentdetail.order_id')
        ->join('payment','payment.id','=','paymentdetail.payment_id')
        ->join('product','product.id','=','paymentdetail.product_id')
        ->select('paymentdetail.*',
                 'order.tracking_number as tracking_number',
                 'order.status as orderstatus',
                 'payment.id as payment_id',
                 'payment.user_id as user_id',
                 'payment.status as paymentstatus',
                 'paymentdetail.order_id as order_id',
                 'paymentdetail.id as paymentdetail_id',
                 'paymentdetail.created_at as created_at',
                 'payment.totalprice as totalprice',
                 'payment.image as image',
                 'product.name as productname',
                 'product.cost as cost')
                 ->where('payment.user_id', Auth::id())
                 
        ->get();
        return view('product_tracking',['data2'=>$data2->toarray(),'payment'=>$payment->toarray(),'order'=>$order->toarray(),'m'=>$m->toarray(),'type'=> $types->toArray(),'cart'=>$cart]); 
        
        
    }
    
    
}