<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use Auth;
use App\User;
use App\Housings;
use App\Comment;
use App\photoAddress;
use App\Http\Requests\EditUserRequest;
use Illuminate\Support\Facades\DB;

class MainController extends Controller
{
    function index(){
        return view('auth.login');
    }

    function goHome(){
        return view('welcome');
    }

    function checklogin(Request $request){
        $this->validate($request,[
            'email' => 'required',
            'password' => 'required|alphaNum|min:3',
        ]);

        $user_data = array(
            'email' => $request->get('email'),
            'password' =>$request->get('password')
        );

        if(Auth::attempt($user_data)){
            return redirect('/main/successlogin');
        }
        else{
            return back()->with('error','اطلاعات کاربری نادرست');
        }
        
    }

    function successlogin(){
        $house=DB::table('Housings')->get(); 
        return view('redirect',['house' => $house]);   
    }

    function logout(){
        Auth::logout();
        return redirect('/hello');
    }

    function goProfile(){
        return view('profile');
    }

    function goHouseItem($id,$userid){
        $house=DB::table('Housings')->get()->where('id',$id); 
        $user=DB::table('Users')->get()->where('id',$userid)->first(); 
        $addr=DB::table('photo_addresses')->get()->where('homeid',$id);        
        return view('new',['house' => $house,'user' => $user,'addr'=>$addr]); 
    }

    function seeUsersList(){
        $users=DB::table('Users')->get()->where('access','normal'); 
        return view('userLists',['users' => $users]);
        //return view('userLists');
    }

    function promoteUser($id){
        DB::table('Users')->where('id',$id)->update(['access' => 'admin']); 
        return redirect('/main/list');
        //return view('userLists');
    }
    function deleteUser($id){
        DB::table('Users')->where('id', '=', $id)->delete();
        return redirect('/main/list');
    }

    function sendComment(Request $request){
        $comment=new Comment;
        $comment->comment = $request->get('comment');
        $comment->homeId = $request->get('homeId');
        $comment->userId = $request->get('userId');
        $comment->save();
        return redirect('/main/successlogin');
    }

    function searchHouse(Request $request){
        $location=$request->get('location');
        $house=DB::table('Housings')->get()->where('location',$location); 
        return view('redirect',['house' => $house,'title'=>'نتایج جستجو']); 
    }

}
