<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Validator;
use Auth;
use App\Http\Requests\EditUserRequest;


class RegistrationController extends Controller
{
    public function create()
    {
        return view('register');
    }
    public function store(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'sirname' => 'required',
            'password' => 'required|confirmed',
            'email' => 'required|email'
        ]);

    
        // $this->validate(request(),[
        //     'name' => 'required',
        //     'sirname' => 'required',
        //     'password' => 'required|confirmed',
        //     'phone' =>'reqiured',
        //     'email' => 'required|email'
        // ]);
    
        
        $user = User::create(request(['name','sirname','password','phone','email']));
        
        auth()->login($user);
        
        return redirect()->to('/main');
    }

    // function update( EditUserRequest $request){

    //     $user = Auth::user();  
    //     $name       = $request->get('name');
    //     $sirname    = $request->get('sirname');
    //     $phone      = $request->get('phone');
    //     $email      = $request->get('email');
      
          
         
    //     $user->save();
        
    // }
          
    public function update(Request $request)
    {
        $user = Auth::user();  
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'sirname' => 'required',
            'password' => 'required|confirmed',
            'email' => 'required|email'
        ]);

        
        $user->name       = $request->get('name');
        $user->sirname    = $request->get('sirname');
        $user->phone      = $request->get('phone');
        $user->email      = $request->get('email');
        $user->save();
        return redirect('/main/profile');
    }

    
}
