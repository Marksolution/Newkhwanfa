<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product as product;
use App\Order as order;
use App\Shop as shop;
use App\Orderdetail as orderdetail;
use App\Payment as payment;
use Auth;
use DB;
use App\Paymentdetail as paymentdetail;
use Carbon\Carbon;

class PaymentController extends Controller
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
     * show detail of payment
     */
    public function detail($id)
    {
        $data = DB::table('payment')
            ->where('payment.id','=',$id)
            ->select('payment.*','payment.id as payment_id')
            ->first();

        //dd($data);
        return view('payment',['data' => $data]);
    }
    
    /**
     * update payment status
     */
    public function update(Request $req)
    {
         $id = $req->id;
        // $status = $req->status;
        // $req->request->remove('_token');
        // payment::where('id','=',$req->input())->update($req->all());
        //dd($payment);
        // DB::transaction(function() {
        //     $data = DB::table('payment')
        //         ->where('id', $id)
        //         ->update(['status' => 3, 'updated_at' => Carbon::now()]);
        // });
        $payment=payment::where('id', '=', $id)->update(
            array(
                
                'status' =>  $req->status,
            )
            
        );
        $order=paymentdetail::join('payment','payment.id','=','paymentdetail.payment_id')
        ->join('product','product.id','=','paymentdetail.product_id')
        ->join('order','order.id','=','paymentdetail.order_id')
        ->select('paymentdetail.*','order.status as orderstatus','paymentdetail.quantity as quantity')
        ->where('payment_id', '=', $id)
        ->get();
        //dd($order);
        foreach($order as $item){
        
            order::where('id', '=', $item['order_id'])->update(
            array(
                'status' =>  $req->status,
            )
            
        );
        }
       
        return redirect('/clearmoney');
    }
}