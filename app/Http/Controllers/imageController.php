<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class imageController extends Controller
{
    public function storeImage(Request $request){


        if($request->file('image')){
            $file= $request->file('image');
            $filename= date('YmdHi').$file->getClientOriginalName();
            $file-> move(public_path('public\Image'), $filename);
            //$data['image']= $filename;
            
        }
        return redirect()->route('landingPage');
       
    }
}
