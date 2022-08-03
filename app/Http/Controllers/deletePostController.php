<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class deletePostController extends Controller
{
    function deletePost($id){
        $post = Post::find($id);

        if($post){
            $post->delete();
            return response()->json(200);

        }
        else{
            return response()->json(404);
            
        }

    }
}
