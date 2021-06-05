<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

use Carbon\Carbon;
class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $data = DB::table('users')->get();
        return view('users', ["data" => $data->toArray()]);
    }
    public function detail($id)
    {
        $data = DB::table('users')->find($id);             
        return view('usersdetail', ["data" => $data]);
    }
    public function update(Request $req){
        $id = $req->id;
        $type = $req->type;
        
        $result = DB::table('users')->where('id',$id)
            ->update(["role" => $type, 'updated_at' => Carbon::now()]);
        
        return redirect('/users');
    }
}
