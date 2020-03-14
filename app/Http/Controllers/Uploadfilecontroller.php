<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Housings;
use Illuminate\Support\Facades\DB;
use App\User;
use Validator;
use Auth;
use App\Http\Requests\EditUserRequest;
use App\photoAddress;

class Uploadfilecontroller extends Controller
{

    public $myuser;

    function index(){
     return view('upload');
    }

    function saveFile(Request $request){


        $this->validate($request, [
           'title' => 'required',
           'price' => 'required',
           'type' => 'required',
           'area' => 'required',
           'bedrooms' =>'required',
           'parkings' => 'required',
           'location' => 'required',
           //'pic' => 'required|image|mimes:jpg,png,gif|max:2048',
           'estate' => 'required'
        ]);

        $user_data = array(
           'title' => $request->get('title'),
           'price' => $request->get('price'),
           'type' =>  $request->get('type'),
           'area' =>  $request->get('area'),
           'bedrooms' => $request->get('bedrooms'),
           'parkings' => $request->get('parkings'),
           'location' =>  $request->get('location'),
           //'pic' =>  $request->get('pic')->getClientOriginalExtension(),
           'estate' => $request->get('pic')
        );
        
        if($request->hasFile('pic')) {
            $filename=$request->pic->getClientOriginalName();
            $house=new Housings;
            $house->title=$request->get('title');
            $house->price=$request->get('price');
            $house->type=$request->get('type');
            $house->area=$request->get('area');
            $house->bedrooms=$request->get('bedrooms');
            $house->parkings=$request->get('parkings');
            $house->location=$request->get('location');
            $request->pic->storeAs('public/uploadFiles',$filename);
            $house->pic= $filename;
            $house->estate=$request->get('estate');
            $house->userid=$request->get('userid');
            //$myuser=$request->get('userid'); //userid
            $house->save();      
            return view('upload');
            //Housing::
        }

        
        
        //return $request->all();
        

        // $image = $request->file('pic');
    }

    function show(){

        return Storage::url('test.jpg');

    }


    function checkTableData(){
     //$estateName= $request->get('estate');
     $house=DB::table('Housings')->get()->where('userid','1'); 
     return view('upload',['house' => $house]);
    } 
    
}

?>