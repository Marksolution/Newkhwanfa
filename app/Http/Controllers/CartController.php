<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product as product;
use App\Order as order;
use App\Shop as shop;
use App\Cart as cart;
use App\Payment as payment;
use App\Paymentdetail as paymentdetail;
use App\Promotion as promotion;
use App\Thaipost as thaipost;
use App\Province as province;
use App\Amphure as amphure;
use App\District as district;
use App\Address as address;
use App\Orderdetail as orderdetail;
use App\Producttype as producttype;
use Auth;
use DB;
use Carbon\Carbon;

class CartController extends Controller
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
        
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function saveship(Request $req)
    {
        $cartdata = new cart ;
        $cartdata->shippingcost = $req->ship;
        $cartdata->save();
        //dd($data);
        return redirect()->route('buyproduct');
        
    }
    /// VIEW:DETAILPRODUCT -> CART ------------------------------
    public function postproducttocart(Request $req)
    {
                    
        $data = cart::
        where([['user_id','=', Auth::id()],['product_id' ,'=',  $req->product_id]])
        ->select('cart.*')
        ->first();   
        //dd($data);      
        if ($data === null) {
            $cartdata = new cart ;
            $cartdata->user_id = Auth::id();
            $cartdata->product_id = $req->product_id;
            $cartdata->shop_id = $req->shop_id;
            $cartdata->productname = $req->name;
            $cartdata->detail = $req->detail;
            $cartdata->cost = $req->cost;
            $cartdata->weight = $req->weight;
            $cartdata->amount = $req->amountpro;
            $cartdata->shippingcost = $req->shippingcost;
            $cartdata->save();
         }
         else {
            cart:: where([['user_id','=', Auth::id()],['product_id' ,'=',  $req->product_id]])
            ->update(array('amount' =>$data->amount+$req->amountpro));
         }

        
        //dd($cartdata);
        return redirect()->route('cart',["id"=>Auth::id()]);
        
    }
     /// VIEW:FIRST -> CART ------------------------------
    public function postdatatocart(Request $req)
    {
        $data = cart::
        where([['user_id','=', Auth::id()],['product_id' ,'=',  $req->product_id]])
        ->select('cart.*')
        ->first();   
        //dd($data);      
        if ($data === null) {
            $cartdata = new cart ;
            $cartdata->user_id = Auth::id();
            $cartdata->product_id = $req->product_id;
            $cartdata->shop_id = $req->shop_id;
            $cartdata->productname = $req->name;
            $cartdata->detail = $req->detail;
            $cartdata->cost = $req->cost;
            $cartdata->weight = $req->weight;
            $cartdata->amount = 1;
            $cartdata->shippingcost = $req->shippingcost;
            $cartdata->save();
         }
         else {
            cart:: where([['user_id','=', Auth::id()],['product_id' ,'=',  $req->product_id]])
            ->update(array('amount' =>$data->amount+1));
         }
       
        //dd($cartdata);
        return redirect()->route('first_data');
        
    }
     /// VIEW:DETAILPRODUCT -> CART ------------------------------
    public function salenow(Request $req)
    {
        $data = cart::
        where([['user_id','=', Auth::id()],['product_id' ,'=',  $req->product_id]])
        ->select('cart.*')
        ->first();  
       
        if ($data === null) {
        $cartdata = new cart ;
        $cartdata->user_id = Auth::id();
        $cartdata->product_id = $req->product_id;
        $cartdata->shop_id = $req->shop_id;
        $cartdata->productname = $req->name;
        $cartdata->detail = $req->detail;
        $cartdata->cost = $req->cost;
        $cartdata->weight = $req->weight;
        $cartdata->amount =  $req->amountpro;
        $cartdata->shippingcost = $req->shippingcost;
        $cartdata->save();
        }
        else {
        cart:: where([['user_id','=', Auth::id()],['product_id' ,'=',  $req->product_id]])
        ->update(array('amount' =>$data->amount+$req->amountpro));
        }
        return redirect()->route('bill');
        
    }
     /// VIEW:DETAILPROMOTION -> CART ------------------------------
    public function postpromotiontocart(Request $req)
    {
        
        $data = cart::
        where([['user_id','=', Auth::id()],['product_id' ,'=',  $req->product_id]])
        ->select('cart.*')
        ->first();   
        //dd($data);      
        if ($data === null) {
            $cartdata = new cart ;
            $cartdata->user_id = Auth::id();
            $cartdata->product_id = $req->product_id;
            $cartdata->shop_id = $req->shop_id;
            $cartdata->weight = $req->weight;
            $cartdata->detail = $req->detail;
            $cartdata->cost = $req->promotion_price;
            $cartdata->productname = $req->productname;
            $cartdata->amount =  $req->amountpro;
            $cartdata->save();
         }
         else {
            cart:: where([['user_id','=', Auth::id()],['product_id' ,'=',  $req->product_id]])
            ->update(array('amount' =>$data->amount+$req->amountpro));
         }

        
        
        return redirect()->route('cart',["id"=>Auth::id()]);
        
    }
     /// จ่ายเงินแล้วส่งข้อมูลไปออร์เดอร์
     public function postdataorder(Request $req)
     {
        DB::beginTransaction();

        try {

         $data = $this->getItemFormUserCart();
         //dd($data);
         //add data to payment
         $payment = new payment ; 
         $payment->user_id = Auth::id();
         $payment->status = 1;
         $payment->totalprice = $data['payment_price'];
         $path = $req->image->store('payment','public');
         $payment->image = $path;
         $payment->save();
         $orderarray = array();
         foreach($data['shops'] as $item =>$val){
         //dd($data['shops']);
           
                
            //add data to order
            $order = order::all();
            $neworder = new order ;
            $neworder->user_id = Auth::id();
            $neworder->address_id = $req->ad;
            $neworder->total_price = $val['sum'];
            $neworder->shipping_cost = $val['calweighttotal'];
            $neworder->code_coupon = 0;
            $neworder->status = 1;
            $neworder->shop_id =$val['shop_id'];
            $neworder->save();
            //dd($neworder);
                
            
            $val['orderid']= $neworder->id;
            $orderarray[$item]=$val;
               
            }
         
         foreach($data['newpro'] as $orderid=>$val ){
         //add data to orderdetail
         //dd($data['newpro']);
             foreach($val as $subv){
                 //dd($value);
                 $ordeid = 0;
                foreach($orderarray as $item ){
                    if($item['shop_id']==$subv['shop_id'])
                    $ordeid = $item['orderid'];
                    //dd($orderarray);
                }

             $order_id = $ordeid;
             $orderdetail = new orderdetail ;
             $orderdetail->order_id = $order_id;
             $orderdetail->product_id = $subv['product_id'];
             $orderdetail->quantity = $subv['amount'];
             $orderdetail->total_price = $subv['sum'];
             $orderdetail->save();
                  
             }
         }
 
         foreach($data['newpro'] as $order_id =>$val){
         //add data to paymentdetail
         //dd($orderarray);
            //dd($val);
            foreach($val as $subv){
                //dd($value);
               $ordeid = 0;
               foreach($orderarray as $item ){
                   if($item['shop_id']==$subv['shop_id'])
                   $ordeid = $item['orderid'];
               }
            $order_id = $ordeid;
            $paymenntdetail = new paymentdetail ; 
            $paymenntdetail->order_id = $order_id;
            $paymenntdetail->payment_id = $payment->id;
            $paymenntdetail->product_id = $subv['product_id'];
            $paymenntdetail->shop_id = $subv['shop_id'];
            $paymenntdetail->quantity = $subv['amount'];
            $paymenntdetail->save();
            $paymenntdetail->created_at = Carbon::now()->toDateTimeString();
            //dd($paymenntdetail);
          }
        }
         
         //delete cart by user_id 
         $cart = cart::where('cart.user_id','=',Auth::id())->delete();
         DB::commit();
        } catch (\Exception $e) {
            DB::rollback();
            // something went wrong
         }
         return redirect()->route('first_data');
       
     }
     public function getItemFormUserCart(){
        $data = cart::join('shop', 'shop.id', '=', 'cart.shop_id')
        ->join('product', 'product.id', '=', 'cart.product_id')
        ->select('cart.*','shop.name as nameshop','product.img_product as imgpro','cart.amount as amountpro','product.weight as weight')
                    ->where('cart.user_id','=', Auth::id())
                    ->orderBy('cart.shop_id', 'asc')
                  //  ->groupBy('cart.shop_id')
                    ->get();
                   
        // $insert =cart::firstOrNew(['product_id' => $address1->address]);
        // joid shopname
        $newpro = array();
        $ship = 0;
        $ships = 0;
        foreach($data as $val){
            //echo($val['nameshop']);
            $nameshop = $val['nameshop'];
            // $key2 = $val['product_id'];
            $amountpro = $val['amountpro'];
            $weight = $val['weight'];
            $cost = $val['cost'];
            $val['shippingcost'] = $this->calWeghtCost($val['weight']);
            $val['costss'] =($cost * $amountpro);
            $val['weighttotal'] =($weight * $amountpro);
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
                                                    elseif($p>=13000 &&
                                                    $p<= 13999) { $ships=507; }
                                                    elseif($p>=14000 &&
                                                    $p<= 14999) { $ships=522; }
                                                    elseif($p>=15000 &&
                                                    $p<= 15999) { $ships=537; }
                                                    elseif($p>=16000 &&
                                                    $p<= 16999) { $ships=552; }
                                                    elseif($p>=17000 &&
                                                    $p<= 17999) { $ships=567; }
                                                    elseif($p>=18000 &&
                                                    $p<= 18999) { $ships=582; }
                                                    elseif($p>=19000 &&
                                                    $p<= 19999) { $ships=597; }
                                                    elseif($p>=20000 &&
                                                    $p<= 20001) { $ships=612; }
                                                    else{} 
                                                        $ship =($ship + $ships);
            $val['calweighttotal'] = $ships;
            $val['sum']= $val['costss']+ $val['calweighttotal'];
            if(empty($newpro[$nameshop])) $newpro[$nameshop] = array($val);
          
            else $newpro[$nameshop][] = $val;
        }
        $w = array();
        $m =0;
        $z =0;
        $t=0;
            foreach($newpro as $key=>$val){
              
                $w += array($key=>array());
                $w[$key] += array('weighttotal'=>0,'calweighttotal'=>0,'costss'=>0); 
                foreach($val as $subv){
                     //dd($subv);
                    $w[$key]['weighttotal'] += $subv['weighttotal'];
                    $w[$key]['costss']+=$subv['costss'];
                    $w[$key]['shop_id']=$subv['shop_id'];
                    $w[$key]['product_id']=$subv['product_id'];
                    $w[$key]['amount']=$subv['amount'];
                    $w[$key]['calweighttotal'] = $this->calWeghtCost($w[$key]['weighttotal']);
                    $w[$key]['sum']=$w[$key]['costss']+$w[$key]['calweighttotal'];
                }
                $w[$key]['calweighttotal'] = $this->calWeghtCost($w[$key]['weighttotal']);
                $m+= $w[$key]['calweighttotal'];
                $z+= $w[$key]['costss'];
                $t += $w[$key]['costss']+$w[$key]['calweighttotal'];
               
            }
            $newarray = array("shops"=>$w,"shipping_cost"=>$m,"total_priceShop"=>$z,"newpro"=>$newpro,"payment_price"=>$t);
            
            return $newarray;
    }
    
     /// จ่ายเงิน แนบสลิป
    public function buyproduct(Request $req){
        // $addid = new address();
        // $addid->id = $req->add_id;
        // $addid->id = $req->add_id;
            $ad = $req->Radio;

        $data = cart::join('shop', 'shop.id', '=', 'cart.shop_id')
        ->join('product', 'product.id', '=', 'cart.product_id')
        ->select('cart.*','shop.name as nameshop','product.img_product as imgpro','cart.amount as amountpro','product.weight as weight')
        ->where('cart.user_id','=', Auth::id())
        ->orderBy('cart.shop_id', 'asc')
        ->get();
                   
        // $insert =cart::firstOrNew(['product_id' => $address1->address]);
        // joid shopname
        $newpro = array();
        $ship = 0;
        $ships = 0;
        foreach($data as $val){
            //echo($val['nameshop']);
            $nameshop = $val['nameshop'];
            // $key2 = $val['product_id'];
            $amountpro = $val['amountpro'];
            $weight = $val['weight'];
            $cost = $val['cost'];
            $val['shippingcost'] = $this->calWeghtCost($val['weight']);
            $val['costss'] =($cost * $amountpro);
            $val['weighttotal'] =($weight * $amountpro);
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
                                                    elseif($p>=13000 &&
                                                    $p<= 13999) { $ships=507; }
                                                    elseif($p>=14000 &&
                                                    $p<= 14999) { $ships=522; }
                                                    elseif($p>=15000 &&
                                                    $p<= 15999) { $ships=537; }
                                                    elseif($p>=16000 &&
                                                    $p<= 16999) { $ships=552; }
                                                    elseif($p>=17000 &&
                                                    $p<= 17999) { $ships=567; }
                                                    elseif($p>=18000 &&
                                                    $p<= 18999) { $ships=582; }
                                                    elseif($p>=19000 &&
                                                    $p<= 19999) { $ships=597; }
                                                    elseif($p>=20000 &&
                                                    $p<= 20001) { $ships=612; }
                                                    else{} 
                                                        $ship =($ship + $ships);
            $val['calweighttotal'] = $ships;
            if(empty($newpro[$nameshop])) $newpro[$nameshop] = array($val);
            else $newpro[$nameshop][] = $val;
        }
        $w = array();
        $m =0;
        $z =0;
        $t=0;
            foreach($newpro as $key=>$val){
                $w += array($key=>array());
                $w[$key] += array('weighttotal'=>0,'calweighttotal'=>0,'costss'=>0); 
                foreach($val as $subv){
                    $w[$key]['weighttotal'] += $subv['weighttotal'];
                    $w[$key]['costss']+=$subv['costss'];
                    
                    $w[$key]['calweighttotal'] = $this->calWeghtCost($w[$key]['weighttotal']);
                    $w[$key]['sum']=$w[$key]['costss']+$w[$key]['calweighttotal'];
                }
                $w[$key]['calweighttotal'] = $this->calWeghtCost($w[$key]['weighttotal']);
                $m+= $w[$key]['calweighttotal'];
                $z+= $w[$key]['costss'];
                $t += $w[$key]['costss']+$w[$key]['calweighttotal'];
               
            }
        $cart = cart::where('cart.user_id','=',Auth::id())->get();
        $types = producttype::all();
        
        //dd($data);
        
        return view('buyproduct',['z'=>$z,'t'=>$t,'m'=>$m,'w'=>$w,'data'=>$data,'type'=> $types->toArray(),'cart'=>$cart,'ad'=>$ad]); 
        
        
    }
   
    
    
    //ตะกร้า --> เลือกตาม user_id
    public function cart()
    {
        $cart = cart::where('cart.user_id','=',Auth::id())->get();
        $types = producttype::all();
        //โชว์ที่อยู่หน้าตะกร้า ที่เลือกแล้ว
        $address2 = address::
        where('address.user_id','=',Auth::id())
        ->select('address.*')
        ->limit(1)->get();

        $address = address::
        where('address.user_id','=',Auth::id())
        ->select('address.*')
        ->get();
        
        $data = cart::join('shop', 'shop.id', '=', 'cart.shop_id')
        ->join('product', 'product.id', '=', 'cart.product_id')
        ->select('cart.*','shop.name as nameshop','product.img_product as imgpro','cart.amount as amountpro','product.weight as weight')
                    ->where('cart.user_id','=', Auth::id())
                    ->orderBy('cart.shop_id', 'asc')
                  //  ->groupBy('cart.shop_id')
                    ->get();
                   
        // $insert =cart::firstOrNew(['product_id' => $address1->address]);
        // joid shopname
       
        $newpro = $this->getItemFormUserCart();
        //dd($m,$w,$z,$t);
        //dd($newpro);
        return view('cart',['z'=>$newpro['total_priceShop'],'t'=>$newpro['payment_price'],'m'=>$newpro['shipping_cost']
        ,'w'=>$newpro['shops'],'datacart' => $data->toArray(),'m1' => $newpro['newpro'],'address' => $address->toArray(),'address2' => $address2,'type'=> $types->toArray(),'cart'=>$cart]);
    }
    
   
    public function selectaddress(Request $req){
        // $addid = new address();
        // $addid->id = $req->add_id;
        // $addid->id = $req->add_id;

            $add = new address;
            $add->user_id = Auth::id();
            $add->id = $req->Radio;
            //dd($add);
            // $add->address_name = "s1";
            // $add->address = $req->address;
            // $add->address2 = $req->address2;
            // $add->province_id = $req->province_id;
            // $add->district_id = $req->district_id;
            // $add->amphure_id = $req->amphure_id;
            // $add->firstname = $req->firstname;
            // $add->postcode = $req->postcode;
            // $add->lastname = $req->lastname;
            // $add->telephone = $req->telephone;
            // $add->save();
        // $insert =address::where('id','=', $id)
        // ->update(['address' => $address1->address]);
        // $address1->save();
        return redirect()->route('buyproduct');
    }
    public function calWeghtCost($weight){
        $ship = 0;
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
                                                    elseif($p>=13000 &&
                                                    $p<= 13999) { $ships=507; }
                                                    elseif($p>=14000 &&
                                                    $p<= 14999) { $ships=522; }
                                                    elseif($p>=15000 &&
                                                    $p<= 15999) { $ships=537; }
                                                    elseif($p>=16000 &&
                                                    $p<= 16999) { $ships=552; }
                                                    elseif($p>=17000 &&
                                                    $p<= 17999) { $ships=567; }
                                                    elseif($p>=18000 &&
                                                    $p<= 18999) { $ships=582; }
                                                    elseif($p>=19000 &&
                                                    $p<= 19999) { $ships=597; }
                                                    elseif($p>=20000 &&
                                                    $p<= 20001) { $ships=612; }
                                                        else{} 
                                                        $ship =
                                                        ($ship + $ships);
        return $ships;
    }
  
    public function calcost($cost){
        
        $costs = 0;
        $p=$cost;
        $costs = $costs+$p;
        //dd($weight);
        return $costs;
    }
    
    
    public function bill()
    {
        $address2 = address::
        where('address.user_id','=',Auth::id())
        ->select('address.*')
        ->limit(1)->get();

        $address = address::
        where('address.user_id','=',Auth::id())
        ->select('address.*')
        ->get();
        $data2 = cart::get();
        $cart = cart::where('cart.user_id','=',Auth::id())->get();
        $types = producttype::all();
        $data = cart::join('shop', 'shop.id', '=', 'cart.shop_id')
        ->join('product', 'product.id', '=', 'cart.product_id')
        ->select('cart.*','shop.name as nameshop','product.img_product as imgpro','cart.amount as amountpro','product.weight as weight')
        ->where('cart.user_id','=', Auth::id())
        ->orderBy('cart.shop_id', 'asc')
        ->get();
                   
        // $insert =cart::firstOrNew(['product_id' => $address1->address]);
        // joid shopname
        $newpro = array();
        $ship = 0;
        $ships = 0;
        foreach($data as $val){
            //echo($val['nameshop']);
            $nameshop = $val['nameshop'];
            // $key2 = $val['product_id'];
            $amountpro = $val['amountpro'];
            $weight = $val['weight'];
            $cost = $val['cost'];
            $val['shippingcost'] = $this->calWeghtCost($val['weight']);
            $val['costss'] =($cost * $amountpro);
            $val['weighttotal'] =($weight * $amountpro);
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
                                                    elseif($p>=13000 &&
                                                    $p<= 13999) { $ships=507; }
                                                    elseif($p>=14000 &&
                                                    $p<= 14999) { $ships=522; }
                                                    elseif($p>=15000 &&
                                                    $p<= 15999) { $ships=537; }
                                                    elseif($p>=16000 &&
                                                    $p<= 16999) { $ships=552; }
                                                    elseif($p>=17000 &&
                                                    $p<= 17999) { $ships=567; }
                                                    elseif($p>=18000 &&
                                                    $p<= 18999) { $ships=582; }
                                                    elseif($p>=19000 &&
                                                    $p<= 19999) { $ships=597; }
                                                    elseif($p>=20000 &&
                                                    $p<= 20001) { $ships=612; }
                                                    else{} 
                                                        $ship =($ship + $ships);
            $val['calweighttotal'] = $ships;
            if(empty($newpro[$nameshop])) $newpro[$nameshop] = array($val);
            else $newpro[$nameshop][] = $val;
        }
        $w = array();
        $m =0;
        $z =0;
        $t=0;
            foreach($newpro as $key=>$val){
                $w += array($key=>array());
                $w[$key] += array('weighttotal'=>0,'calweighttotal'=>0,'costss'=>0); 
                foreach($val as $subv){
                    $w[$key]['weighttotal'] += $subv['weighttotal'];
                    $w[$key]['costss']+=$subv['costss'];
                    
                    $w[$key]['calweighttotal'] = $this->calWeghtCost($w[$key]['weighttotal']);
                    $w[$key]['sum']=$w[$key]['costss']+$w[$key]['calweighttotal'];
                }
                $w[$key]['calweighttotal'] = $this->calWeghtCost($w[$key]['weighttotal']);
                $m+= $w[$key]['calweighttotal'];
                $z+= $w[$key]['costss'];
                $t += $w[$key]['costss']+$w[$key]['calweighttotal'];
               
            }
        //dd($newpro);
        return view('bill',['address2'=>$address2,'address'=>$address,'z'=>$z,'t'=>$t,'m'=>$m,'w'=>$w,'data'=>$data2,'datacart' => $data->toArray(),'m1' => $newpro,'type'=> $types->toArray(),'cart'=>$cart]); 
    }
   
    public function deletecart($id)
    {
      
        cart::where('id','=',$id)->delete();
        return redirect()->route('cart',["id"=>Auth::id()]);
        //dd($cart->toArray());
       
    }
     /// CART -----------------------------------------
    public function plus($id )
    {
        $amountpro = cart::where('cart.id','=',$id)
        ->select('cart.*','cart.amount as amountpro')
        ->first();

        $amount = $amountpro ->amountpro;
        $amount =  $amount + 1;
        //dd($amount);
        cart::where('cart.id','=',$id)->update(
            array(
                'amount' =>$amount ,
                
            )
        );
       
        //print('$plus');
        return redirect()->route('cart',["id"=>Auth::id(),'x' => $amountpro]);
        
       
    }
    public function minus($id)
    {
        $amountpro = cart::where('cart.id','=',$id)
        ->select('cart.*','cart.amount as amountpro')
        ->first();
        
        $amount = $amountpro ->amountpro;
        $amount =  $amount - 1;
        //dd($amount);
        cart::where('cart.id','=',$id)->update(
            array(
                    
                'amount' =>$amount 

            )
        );
        
        //print('$plus');
        return redirect()->route('cart',["id"=>Auth::id(),'x' => $amountpro]);
        
       
    }
    /// PRODUCT -----------------------------------------
    public function pluspro($id)
    {
        $data = product::where('product.id','=',$id)->get();
        $amountpro = product::where('product.id','=',$id)
        ->select('product.*','product.amount2 as amountpro')
        ->first();
        
        $amount = $amountpro ->amountpro;
        $amount =  $amount + 1;
        //dd($amount);
        product::where('product.id','=',$id)->update(
            array(
                'amount2' =>$amount 
            )
        );
        
        //print('$plus');
        return redirect()->route('detailproduct',["id"=>$amountpro->id,'x' => $amountpro]);
        
       
    }
    public function minuspro($id)
    {
        $data = product::where('product.id','=',$id)->get();
        $amountpro = product::where('product.id','=',$id)
        ->select('product.*','product.amount2 as amountpro')
        ->first();
        
        $amount = $amountpro ->amountpro;
        $amount =  $amount - 1;
        //dd($amount);
        product::where('product.id','=',$id)->update(
            array(
                    
                'amount2' =>$amount 

            )
        );
        
        //print('$plus');
        return redirect()->route('detailproduct',["id"=>$amountpro->id,'x' => $amountpro]);
        
       
    }
    /// PROMOTION -----------------------------------------
    public function pluspromotion($id)
    {
       
        $amountpro = promotion::where('promotion.id','=',$id)
        ->select('promotion.*','promotion.amount as amountpro')
        ->first();
        
        $amount = $amountpro ->amountpro;
        $amount =  $amount + 1;
        //dd($amount);
        promotion::where('promotion.id','=',$id)->update(
            array(
                'amount' =>$amount 
            )
        );
        
        //print('$plus');
        return redirect()->route('detailpromotion',["id"=>$amountpro->id,'x' => $amountpro]);
        
       
    }
    public function minuspromotion($id)
    {
       
        $amountpro = promotion::where('promotion.id','=',$id)
        ->select('promotion.*','promotion.amount as amountpro')
        ->first();
        
        $amount = $amountpro ->amountpro;
        $amount =  $amount - 1;
        //dd($amount);
        promotion::where('promotion.id','=',$id)->update(
            array(
                'amount' =>$amount 
            )
        );
        
        //print('$plus');
        return redirect()->route('detailpromotion',["id"=>$amountpro->id,'x' => $amountpro]);
        
       
    }

    public function update_cart(Request $req )
    {
            cart::where('id', '=', $req->id)->update(
                array(
                    
                    'cost' => $req->cost,
                    'amount' => $req->amount,
                )
            );
        return redirect()->route('cart');
       
    }

    public function cartsum()
    {
        $cartsums = Cart::countent();
        return view('cart.cartsum',compact('cartsums'));
    }
    
}