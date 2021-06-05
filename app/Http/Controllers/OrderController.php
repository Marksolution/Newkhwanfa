<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Carbon\Carbon;
use Auth;
use App\Paymentdetail as paymentdetail;
use App\Product as product;
class OrderController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $results = DB::table('orderdetail')
            ->select('orderdetail.order_id',
                'order.tracking_number',
                'users.name as username',
                'order.status as orderstatus',
                'payment.status as paymentstatus',
                'order.created_at',
                'order.updated_at')
            
            ->leftjoin('order','order.id','=','orderdetail.order_id')
            ->leftjoin('product','product.id','=','orderdetail.product_id')
            ->leftjoin('shop','shop.id','=','product.shop_id')
            ->leftjoin('users','users.id','=','order.user_id')
            ->leftjoin('payment','payment.id','=','order.id')
            ->leftjoin('paymentdetail','paymentdetail.order_id','=','order.id')
            ->where('shop.user_id','=',Auth::id())
            ->groupBy('order_id')
            ->get();
        //dd($results->toArray());
        return view('order_shop',['data' => $results->toArray()]);
    }
    /**
     * For update order status with tracking number parameters
     */
    public function update(Request $req){

            //dd($orderid); 
        //dd($orderid, $trackingnumber);
        DB::transaction(function()  use ($req){
            $orderid = $req->orderid;
            $trackingnumber = $req->trackingnumber;
            //dd($orderid);
            $result = DB::table('order')
                ->where('id',$orderid)
                ->update(['tracking_number' => $trackingnumber,
                    'status' => 3,
                    'updated_at' => Carbon::now()]);

            $result = DB::table('payment')
            ->where('id',$orderid)
            ->update([
            'status' => 3,
            'updated_at' => Carbon::now()]);

            $order=paymentdetail::join('payment','payment.id','=','paymentdetail.payment_id')
            ->join('product','product.id','=','paymentdetail.product_id')
            ->join('order','order.id','=','paymentdetail.order_id')
            ->select('paymentdetail.*','order.status as orderstatus','paymentdetail.quantity as quantity','product.id as productid')
            ->where('order_id', '=', $orderid)
            ->get();
            //dd($order);
           
            
            // $productid = $order->product_id[0];
            // $product = product::
            // select('product.*','product.amount as amount','product.id as productid')
            // ->where('id','=', $productid)
            // ->get();
            // $paymnetquantity = $order->quantity;
            // $productamunt = $product->amount;
            // $results =$paymnetquantity - $productamunt;
    
            // product::where('id','=', $productid)->update(
            //     array(
            //         'amount' =>   $results,
            //     )
            //     );
        });

        return redirect('/order');
    }
    /**
     * display order detail by orderid
     */
    public function orderdetail_shop($id)
    {
        $order = DB::table('order')
            ->select('order.id as orderid',
                        'order.total_price as totalproce',
                        //'order.address_id as addressid',
                        'order.tracking_number as tracking_number',
                        'order.shipping_cost as shipping_cost',
                        'order.status as status',
                        'order.created_at as created_at',
                        'users.name as username',
                        'users.email as useremail',
                        'users.phone as userphone',
                        //------------------------ที่อยู่
                        'address.firstname as addressfirstname',
                        'address.lastname as addresslastname',
                        'address.address as address1',
                        'address.address2 as address2',
                        'address.province_id as province_id',
                        'address.amphure_id as amphure_id',
                        'address.district_id as district_id',
                        'address.postcode as postcode',
                        'address.telephone as addressphone',
                        )
            ->where('order.id','=',$id)
            ->leftJoin('users','users.id','=','order.user_id')
            ->leftJoin('address','address.id','=','order.address_id')
            
            ->first();

        $orderdetail = DB::table('orderdetail')
            ->select('orderdetail.id as id',
                'product.id as productid',
                'product.name as productname',
                'product.detail as productdetail',
                'orderdetail.quantity as quantity',
                'orderdetail.created_at as created_at',
                'orderdetail.updated_at as updated_at')
            ->where('order_id',$id)
            ->leftJoin('product','product.id','=','orderdetail.product_id')
            ->get();

        
        
        $payment = paymentdetail::join('order','order.id','=','paymentdetail.order_id')
        ->join('payment','payment.id','=','paymentdetail.payment_id')
        ->join('product','product.id','=','paymentdetail.product_id')
        ->select('paymentdetail.*',
                 'payment.id as payment_id',
                 'paymentdetail.order_id as order_id',
                 'paymentdetail.id as paymentdetail_id',
                 'payment.totalprice as totalprice',
                 'payment.image as image',
                 'product.name as productname')
        ->where('payment_id',$id)
        ->first();
        //dd($orderdetail,$order,$payment); 
        
        return view('orderdetail_shop', 
            ['orderdetails'=> $orderdetail->toArray(),
                'order'=>$order,
                'payment'=>$payment ]);
    }
}