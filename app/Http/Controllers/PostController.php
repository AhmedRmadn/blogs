<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Post;
use Illuminate\Support\Facades\Auth;

// if($request->file('image')){
//     $file= $request->file('image');
//     $filename= date('YmdHi').$file->getClientOriginalName();
//     $file-> move(public_path('public/Image'), $filename);
  
// }

class PostController extends Controller
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
    function UpdatePost(Request $req,$id){
        
        $post = Post::find($id);
        

        $authId = auth()->user()->id;
        $postUserId = $post->user_id;
      
        if(auth()->user()->id != $post->user_id){
            return response()->json("you are not the publisher og this post");
         }


       
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
    

    function deletePost($id){
        $post = Post::find($id);
        if(auth()->user()->id != $post->user_id){
             return response()->json("you are not the publisher og this post");
        }

        if($post){
            $post->delete();
            return response()->json(200);

        }
        else{
            return response()->json(404);
            
        }

    }

    function getPosts(Request $req){
        $key = $req->search;
        $posts = Post::all();
        if($key!=null){
        $res  = [] ;
        foreach($posts as $post){
            
            if (str_contains($post->title, $key)){
               $res[] = $post;
            } 
    
        }

        return view('home',["posts"=>$res]);
    }
    else{
        return view('home',["posts"=>$posts]);
    }


    }


}
