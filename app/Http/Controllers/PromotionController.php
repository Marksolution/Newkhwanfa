<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product as product;
use App\Order as order;
use App\Shop as shop;
use App\Orderdetail as orderdetail;
use App\Producttype as producttype;
use App\Promotion as promotion;
use Auth;
use DB;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;

class PromotionController extends Controller
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

    public function table_promotion()
    {
        //get all product for shop
       /* $data = shop::where('shop.user_id', '=', Auth::id())
            ->join('promotion','promotion.id','=','promotion.id')
            ->get();
            ->join('shop','shop.user_id', '=', Auth::id())
            ->where('shop','shop.user_id', '=', 'promotion.shop_id')
          
        return view('promotions' , ['promotion' => $data->toArray()]);*/
        
        //
        $data = promotion::join('product', 'product.id', '=', 'promotion.product_id')
        ->select('promotion.*','product.name as productname')
        ->where('promotion.shop_id','=',Auth::id())->get();//dd($data->toArray());

        //dd($data2);
        return view('promotions' , ['promotion' => $data]);
    }

    public function index()
    {
        $shops = DB::table('shop')
        ->select('shop.id','shop.name as shopname','users.name as username')
        ->leftJoin('users','users.id','=','shop.user_id')
        ->get();
    
        return view('promotions',['shops' => $shops->toArray()]);
    }

    public function new_promotion()
    {
        
        $product = product::where('shop_id','=', Auth::id())
        ->get(); 
        
        //dd($product);
       
        return view('newpromotion' , ["product" => $product->toArray()]);
    }
    
    public function createnewpromotion(Request $req)
    {
        $data = shop::where('shop.user_id', '=', Auth::id())
                    ->select('id')->first();
        //dd($data);
        //print_r($req->input());
        $promotion = new promotion ; 
        $promotion->name = $req->name;
        $promotion->product_id = $req->product_id;
        $promotion->shop_id = $data->id;
        $promotion->detail = $req->detail;
        $promotion->promotion_price = $req->promotion_price;
        $promotion->startdate = strval($req->startdate);
        $promotion->enddate = strval($req->enddate);
        $promotion->amount = 1;
        //$promotion->date = Carbon::now()->toDateTimeString();
        $path = $req->image->store('promotion','public');        
        //$path = $req->file('promotion_image')->store('promotion', 'public');
        $promotion->img_promotion = $path;

        //dd($path);
        //dd($products);
        $promotion->save();
        //dd($promotion->toArray());

        return redirect()->route('promotion'); //view('/shop_warehouse' , ['products'=> array($products->toArray())]);

    }
   
    public function editpromotion($id)
    {
        //dd(" - -");
        $product = product::where('shop_id','=', Auth::id())
        ->get();

        //get product data form database -> where product_id = $id
        $promotions = promotion::where('id','=',$id)->get();
        //dd($promotions->toArray());
        return view('editpromotion', ['item'=> $promotions->toArray()] , ["product" => $product->toArray()]);
    }
        
    public function update_editpromotion( Request $req)
    {
      // dd($req);
        //$req->request->remove('_token');
       // promotion::where('id','=',$req->input())->update($req->all());
        //return redirect()->route('promotion');
        // dd($req->id);
       // dd($product);

        $data = shop::where('shop.user_id', '=', Auth::id())
        ->select('id')->first();
        //dd($req->file('img_promotion'));
        if ($req->file('img_promotion') != null) {
            // $req->remove('img_product');
            $path = $req->file('img_promotion')->store('promotion', 'public'); #file('img_promotion')->store('images','promotion_image');//->store('promotion', 'public');
            // dd($path);
            $img_promotion = $path;
            promotion::where('id', '=', $req->id)->update(
                array(
                    
                    'name' => $req->name,
                    'product_id' => $req->product_id,
                    'shop_id' => $data->id,
                    'detail' => $req->detail,
                    'promotion_price' => $req->promotion_price,
                    'startdate' => $req->startdate,
                    'enddate' => $req->enddate,
                    'img_promotion' =>$img_promotion
                   
                    
                )
            );

        } else {
            promotion::where('id', '=', $req->id)->update(
                array(
                    'name' => $req->name,
                    'product_id' => $req->product_id,
                    'shop_id' => $data->id,
                    'detail' => $req->detail,
                    'promotion_price' => $req->promotion_price, 
                    'startdate' => $req->startdate,
                    'enddate' => $req->enddate
                    
                )
            );
        }
       
        return redirect()->route('promotion');


       
    }

    public function deletepromotion($id)
    {
        //dd($product);
       
        promotion::where('id','=',$id)->delete();
        return redirect()->route('promotion');
        
       
    }
}