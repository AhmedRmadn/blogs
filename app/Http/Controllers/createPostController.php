<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class createPostController extends Controller
{
    function createPost(Request $req){
        $post = new Post ;
        $post->title = $req->title;
        $post->body = $req->body;
        $post->image = $req->image;
        $post->save();
        return "sucess";
    }
}
