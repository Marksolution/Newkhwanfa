<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Carbon\Carbon;
use App\Producttype as producttype;
class ProducttypeController extends Controller
{
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
        $data = DB::table('producttype')->get();
        return view('producttype', ["data" => $data->toArray()]);
    }
    /**
     * display detail of producttype by id
     */
    public function detail($id)
    {
        $data = DB::table('producttype')->find($id);             
        return view('producttypedetail', ["data" => $data]);
    }
    /**
     * update exist producttype name
     */
    public function update(Request $req){
        //$id = $req->id;
        //$newname = $req->name;
        $req->request->remove('_token');
        producttype::where('id','=',$req->input())->update($req->all());
        //DB::transaction(function() {
            //$result = DB::table('producttype')->where('id',$id)
               // ->update(["name" => $newname, 'updated_at' => Carbon::now()]);
        //});

        return redirect('/producttype');
    }
    public function create()
    {        
        return view('producttypecreate');
    }
    /**
     * insert new producttype
     */
    public function insert(Request $req){
        
        $newname = new producttype;
        $newname->name = $req->name;
        $newname->save();

        //DB::transaction(function() {
            //$result = DB::table('producttype')->insert(
               //['name' => $newname,
                //'created_at' => Carbon::now(),
                //'updated_at' => Carbon::now()]
            //);
        //});
        return redirect('/producttype');
    }
    public function delete($id)
    {
        //dd($product);
       
        producttype::where('id','=',$id)->delete();
        return redirect()->route('producttype');
        
       
    }
}
