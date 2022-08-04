<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class createPostController extends Controller
{
    function createPost(Request $req){


        return auth()->user();
        if(auth()->guest()){
            return response()->json(401);
        }
        
        $post = new Post ;
        if($post){
            
            if($req->title){
                $post->title = $req->title;
            }

            if($req->body){
                 $post->body = $req->body;
             }
             if($req->image){
                $post->image = $req->image;
             }
            $post->user_id = auth()->user()->id;
            
            $post->save();
            return response()->json(200);

        }
        else{
            return response()->json(404);
            
        }
    }
}
