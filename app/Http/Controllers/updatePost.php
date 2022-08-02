<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class updatePost extends Controller
{
    function getUpdatedData(Request $req,$id){
        $post = Post::find($id);
        if($post){
            $post->title = $req->title;
            $post->body = $req->body;
            $post->image = $req->image;
            $post->save();
            return "sucess";

        }
        else{
            return "Fail";
        }
    }
}
