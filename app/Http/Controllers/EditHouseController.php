<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Housings;
use App\User;
use App\photoAddress;
use Validator;
use Auth;
use App\Http\Requests\EditUserRequest;

class EditHouseController extends Controller
{
    function editRow($id){
        $house=DB::table('Housings')->get()->where('userid',$id);
        return view('editHouse',['house' => $house]);
    } 

    function selectHomeInfo(Request $request){     
        $id=$request->get('originalHome');
        $data=DB::table('Housings')->get()->where('id', '=', $id);
        // return redirect()->route('goToEdit', ['id' => $userid]);
        return view('editHouse',['data' => $data]);
    }

    function editHomeInfo(Request $request){
        $house=new Housings;
        $house->id=$request->get('homeId');
        $house->title=$request->get('title');
        $house->price=$request->get('price');
        $house->type=$request->get('type');
        $house->area=$request->get('area');
        $house->bedrooms=$request->get('bedrooms');
        $house->parkings=$request->get('parkings');
        $house->location=$request->get('location');
        $house->userid=$request->get('userid');
        $house->estate=$request->get('estate');
        DB::table('Housings')->where('id',$house->id)->update(['title' => $house->title,'price' => $house->price,'type' => $house->type,
        'area' => $house->area,'bedrooms' => $house->bedrooms,'parkings' => $house->parkings,'location' => $house->location,
        'estate' => $house->estate]); 

        if ($request->has('pic')) {
            $filename=$request->pic->getClientOriginalName();
            $photoAddr=new photoAddress;
            $request->pic->storeAs('public/uploadFiles',$filename);
            $photoAddr->homeid=$house->id;
            $photoAddr->photoAddr= $filename;
            $photoAddr->save();      
        }

        return redirect()->route('goToEdit', ['id' => $house->userid]);
    }

    function deleteHouse($id,$userid){
        DB::table('Housings')->where('id', '=', $id)->delete();
        return redirect()->route('goToEdit', ['id' => $userid]);
    }


    function starHouse($id,$access){
        DB::table('Housings')->where('id', '=', $id)->update(['star'=>'1']);
        return redirect()->route('getHomes', ['id' => $id,'access'=>$access]);
    }
    
    // function addMorePhotos(Request $resquest,$id,$firstAddr){
    //     $filename=$request->pic->getClientOriginalName();
    //     $photoAddr=new photoAddress;
    //     $request->pic->storeAs('public/uploadFiles',$filename);
    //     $photoAddr->homeid=$id;
    //     $photoAddr->photoAddr= $filename;
    //     $photoAddr->save();      
    //     return view('upload');

    // }
}
