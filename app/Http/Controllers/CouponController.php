<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product as product;
use App\Order as order;
use App\Shop as shop;
use App\Coupon as coupon;
use App\Orderdetail as orderdetail;
use App\Producttype as producttype;
use Auth;
use DB;
use Carbon\Carbon;

class CouponController extends Controller
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
    public function Coupon()
    {
        $data = DB::table('coupon')
        ->get();
        
        return view('coupon', ['coupon' => $data->toArray()]);
    }
   
   
    
    public function newcoupon()
    {
        $product = product::where('shop_id','=', Auth::id())
        ->get(); 
        
       // dd($product);
       
        return view('newcoupon' , ["product" => $product->toArray()]);
       // dd($type);2
       
    }
    
    
    public function createnewcoupon(Request $req)
    {      
        $coupon = new coupon ;
        $coupon->name_coupon = $req->name;
        $coupon->code_coupon = $req->code_coupon;
        $coupon->minimum = $req->minimum;
        $coupon->discount = $req->Discount;
        $coupon->detail_coupon = $req->detail_coupon;
        $coupon->startdate = strval($req->startdate);
        $coupon->enddate = strval($req->enddate);
        //dd($products->toArray());

        //dd($products);
        $coupon->save();

        return redirect()->route('coupon'); //view('/shop_warehouse' , ['products'=> array($products->toArray())]);

    }
   
    public function editcoupon($id)
    {

        $coupon = coupon::where('id','=',$id)->get();
        return view('editcoupon', ['item'=> $coupon->toArray()] );
       
    }
        
    public function update_editcoupon( Request $req)
    {
        //dd( $req);
            coupon::where('id', '=', $req->id)->update(
                array(

                    'code_coupon'=> $req->code_coupon,
                    'name_coupon' => $req->name_coupon,
                    'minimum' => $req->minimum,
                    'discount' => $req->Discount,
                    'detail_coupon' => $req->detail_coupon,
                    'startdate' => $req->startdate,
                    'enddate' => $req->enddate
                    
                )
            );
       
        return redirect()->route('coupon');
    }

    public function deletecoupon($id)
    {
        //dd($product);
       
        coupon::where('id','=',$id)->delete();
        return redirect()->route('coupon');
        
       
    }
}
