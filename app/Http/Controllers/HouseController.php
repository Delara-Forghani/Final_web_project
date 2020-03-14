<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Housings;
use App\User;
use Validator;
use Auth;
use App\Http\Requests\EditUserRequest;
use Illuminate\Support\Facades\Storage;
class HouseController extends Controller
{
    
    function checkTableData($id,$access){
        //$myuser=$request->get('userid'); //userid
        if($access=="admin"){
            $house=DB::table('Housings')->get();
        }else{   
            $house=DB::table('Housings')->get()->where('userid',$id);
        }    
        return view('userHouse',['house' => $house , 'access' =>$access]);
       } 
}
