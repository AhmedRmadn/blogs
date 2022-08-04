<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;
use Illuminate\Support\Facades\Auth;

class authenticationController extends Controller

{
    function register(Request $request){
       
        $attributes = request()->validate([
            'name' => 'required',
            'email' => 'required|email|max:255|unique:users,email',
            'password' => 'required',
        ]);

        $user = User::create($attributes);
        $user['token'] =  $user->createToken('blog')->plainTextToken;
        auth()->login($user);
        return auth()->user();
        //return response()->json(["user" => $user]);
    }

    function login(Request $request){

        $attributes = request()->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if(Auth::attempt(['email' => $request->email, 'password' => $request->password])){ 
            $user = User::where('email', $request->email)->first(); 
            $user['token'] =  $user->createToken('blog')->plainTextToken; 
   
            return response()->json(['user' => $user], 200);
        } 
        else{ 
            return response()->json('Unauthorised.', ['error'=>'Unauthorised']);
        } 
    }

    function logout(){
        auth()->logout();
        return response()->json("loged out");;

    }
}
