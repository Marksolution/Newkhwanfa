<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Client\Response;
use Illuminate\Support\Facades\Http;
use App\Order as order;
class TrackingController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function detail($id){
        
        $trackingnum = $id;
       
        $response = Http::withHeaders([
            'Content-Type' => 'application/json',
            'Authorization' => 'Token JhNINIO8T!A#OxKvWQW8ZpPVUyQ0KPR=T!P$TZFiI7K#S9CRVVH6Z~PFF_U3ZqCWTHSvDvTvYfB=TdJ-S;S#OSR*RlXjAIXPEHFO'
        ])->withOptions([
            'verify' => false,
        ])->post('https://trackapi.thailandpost.co.th/post/api/v1/track',[
            "status" => "all",
            "language" => "TH",
            "barcode" => [
                "RE209934646TH"
            ]
        ]);
        //dd($response);
        
        if($response->successful()){
            $item = $response['response']['items']['RE209934646TH'];
            //dd($item);
            return view('tracking',['items' => $item , 'barcode' => $id]);
            
        }else{

        }
        

    }
    public function statustack()
    {
      
        return view('statustack');
    }
}