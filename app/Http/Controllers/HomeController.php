<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Auth;

class HomeController extends Controller
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
    public function index()
    {
        // check exist shop
        $result = DB::table('shop')->where('user_id',Auth::id())->first();

        if($result){
            // exist shop redirect to order first
            return redirect('order');
        }
        else{
            // no exist shop redirect to myshop and display create new shop
            return redirect('myshop');
        }
    }
}
