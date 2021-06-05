<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product as product;
use App\Order as order;
use App\Shop as shop;
use App\Province as province;
use App\Amphure as amphure;
use App\District as district;
use App\Address as address;
use App\Cart as cart;
use App\Orderdetail as orderdetail;
use App\Producttype as producttype;
use Auth;
use DB;
use Carbon\Carbon;

class SendaddressController extends Controller
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
    public function sendaddress()
    {
        $add = address::join('users', 'users.id', '=', 'address.user_id')
        ->select('address.*','users.name as username')
        ->get();
        //dd($add);
        $province = DB::table("provinces")->get();
        $district = DB::table("districts")->get();
        $amphure = DB::table("amphures")->get();    
        
        return view('sendaddress',["province" => $province,"district" => $district,"amphure" => $amphure,"data" => $add->toArray()]) ;
        
        
    }
    public function senddataaddress()
    {
        $cart = cart::where('cart.user_id','=',Auth::id())->get();
        $types = producttype::all();
        $address = address::
        where('address.user_id','=',Auth::id())
        
        ->get();
                    
     
     //   dd($address->toSql());
        return  view('newaddress',["data" => $address->toArray(),'type'=> $types->toArray(),'cart'=>$cart]) ;
 
        
        
    }
    public function newaddressUser(Request $req)
    {
        
        $user_id = Auth::id();
        DB::transaction(function () use( $req, $user_id) {
            
            $add = new address;
            $add->user_id = Auth::id();
            $add->address_name = "s1";
            $add->address = $req->address;
            $add->address2 = $req->address2;
            $add->province_id = $req->province_id;
            $add->district_id = $req->district_id;
            $add->amphure_id = $req->amphure_id;
            $add->firstname = $req->firstname;
            $add->postcode = $req->postcode;
            $add->lastname = $req->lastname;
            $add->telephone = $req->telephone;
            $add->save();
            //dd($add);
        });
        return redirect()->route('senddataaddress');
        
    }
    public function newaddressbuy(Request $req)
    {
        
        $user_id = Auth::id();
        DB::transaction(function () use( $req, $user_id) {
            
            $add = new address;
            $add->user_id = Auth::id();
            $add->address_name = "s1";
            $add->address = $req->address;
            $add->address2 = $req->address2;
            $add->province_id = $req->province_id;
            $add->district_id = $req->district_id;
            $add->amphure_id = $req->amphure_id;
            $add->firstname = $req->firstname;
            $add->postcode = $req->postcode;
            $add->lastname = $req->lastname;
            $add->telephone = $req->telephone;
            $add->save();
            //dd($add);
        });
        return redirect()->route('sendaddress');
        
    }
    
    public function editaddress($id)
    {
        $add = address::join('users', 'users.id', '=', 'address.user_id')
                    ->select('address.*','users.name as username')
                    ->where('address.id','=',$id)
                    ->first();
                    //dd($add);
       
        return view('editaddress',["data" => $add->toArray()]) ;
        
        
    }
    public function deleteaddressme($id)
    {
      
        address::where('id','=',$id)->delete();
        return redirect()->route('senddataaddress');
        //dd($cart->toArray());
       
    }

           
    public function updatedataaddress(Request $req )
    {
        $add = address::join('users', 'users.id', '=', 'address.user_id')
                    ->select('address.*','users.name as username')
                    ->get();
        address::where('id', '=', $req->id)->update(
                array(
                   "address_name" => "s1",
                    "address" => $req->address,
                    "province_id" => $req->province_id,
                    "district_id" => $req->district_id,
                    "amphure_id" => $req->amphure_id,
                    "firstname" => $req->firstname,
                    "lastname" => $req->lastname,
                    "postcode" => $req->postcode,
                    "telephone" => $req->telephone
                    
                )
            );
        //dd($req->file('img_promotion'));

        return redirect()->route('senddataaddress');

    }
    public function updateaddress(Request $req )
    {
        $add = address::join('users', 'users.id', '=', 'address.user_id')
                    ->where('address.user_id','=',Auth::id())
                    ->select('address.*','users.name as username')
                    ->get();
        address::where('id', '=', $req->id)->update(
                array(
                   "address_name" => "s1",
                    "address" => $req->address,
                    "province_id" => $req->province_id,
                    "district_id" => $req->district_id,
                    "amphure_id" => $req->amphure_id,
                    "firstname" => $req->firstname,
                    "lastname" => $req->lastname,
                    "postcode" => $req->postcode,
                    "telephone" => $req->telephone
                    
                )
            );
      

        return redirect()->route('cart');

    }

    

    
}