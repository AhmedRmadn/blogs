<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class updatePost extends Controller
{
    function getUpdatedData(Request $req,$id){
        $post = Post::find($id);
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
            
            $post->save();
            return response()->json(200);

        }
        else{
            return response()->json(404);
            
        }
    }
}
