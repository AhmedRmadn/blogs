<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;

class authenticationController extends Controller

{
    function register(Request $request){
       
        $attributes = request()->validate([
            'name' => 'required',
            'email' => 'required|email|max:255|unique:users,email',
            'password' => 'required',
        ]);
        // $user = new User;

        // $user -> name = $request->name;
        // $user -> email = $request->email;
        // $user -> password = $request->password;

        // $user.save(); 
        $user = User::create($attributes);
        auth()->login($user);
        return auth()->user();
        //return response()->json(["user" => $user]);
    }

    function login(Request $request){

        $attributes = request()->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if (! auth()->attempt($attributes)) {
            return response()->json("faild");

        }

        session()->regenerate();

        return response()->json(["user" => auth()->user()]);

    }

    function logout(){
        auth()->logout();
        return response()->json("loged out");;

    }
}
