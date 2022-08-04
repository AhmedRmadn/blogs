<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;

class createPostController extends Controller
{
    function createPost(Request $req){
        
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

            $post->user_id = Auth::user()->id;
            

            $post->save();
            return response()->json(200);

        }
        else{
            return response()->json(404);
            
        }
    }
}
