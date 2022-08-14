<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\updatePost;
use App\Http\Controllers\deletePostController;
use App\Http\Controllers\createPostController;
use App\Http\Controllers\imageController;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\MailController;
use App\Mail\welcomeMail;
use Illuminate\Support\Facades\Mail;
use App\Models\Post;
use App\Models\User;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('/home',function(){
    $serverHost = 'http://127.0.0.1:8000';
    $request = Request::create('http://127.0.0.1:8000/api/','GET');
    $response = Route::dispatch($request);
    $response = json_decode($response->getContent(),true);
    return view('showAllPosts',["posts" => $response['posts']]);
})->name('home')->middleware('auth');;





Route::get('/test',function(){
    $serverHost = 'http://127.0.0.1:8000';
    $request = Request::create('http://127.0.0.1:8000/api/test','GET');
    $response = Route::dispatch($request);
    //$response = json_decode($response->getContent(),true);
    //$jsonobj = '{"Peter":35,"Ben":37,"Joe":43}';
    $json_array = json_decode($response->getContent(),true);

    // Session::put('sessionName', 'message');
    //  //get session
    //  Session::get('sessionName');


    return view('landing',["res" =>  $json_array ['data']]);
});

Route::get('login', function(){
return view('login');
})->name('login')->middleware('guest');


Route::get('register', function(){
    return view('register');
});

Route::post('register',function(Request $request){

    $temp = json_encode($request -> all());
    $serverHost = 'http://127.0.0.1:8000';
    $request = Request::create('http://127.0.0.1:8000/api/register','POST',$request -> all());
    $response = Route::dispatch($request);


    return redirect('/home');

});


Route::post('login', function(Request $request){
    
    $temp = json_encode($request -> all());
    $serverHost = 'http://127.0.0.1:8000';
    $request = Request::create('http://127.0.0.1:8000/api/login','POST',$request -> all());
    $response = Route::dispatch($request);
    return redirect('/home');
});

Route::get('show/{post}', function ($id) {
   
    return view('post',["post"=> Post::find($id)]);
    // return view('register');
});

Route::get('logout', function(){
    $serverHost = 'http://127.0.0.1:8000';
    $request = Request::create('http://127.0.0.1:8000/api/logout','GET');
    $response = Route::dispatch($request);


    return redirect('/login');
});


Route::get('test',[PostController::class,'getPosts']);


Route::post('create',function(Request $request){
      if($request->file('image')){
        $file= $request->file('image');
        $filename= date('YmdHi').$file->getClientOriginalName();
        $file-> move(public_path('public/Image'), $filename);
        $request->image = 'public/Image/' . $filename;
      }
      else {
        $request->image = null;
      }

      $serverHost = 'http://127.0.0.1:8000';
      $request = Request::create('http://127.0.0.1:8000/api/create','POST',$request -> all());
      $response = Route::dispatch($request);
      return redirect('/home');
    
});


Route::get('create',function(){
    return view('createPost');
});


Route::get('update/{post}',function($id){
    return view('updatePost',["post"=> Post::find($id)]);
});



Route::post('update/{post}',function($id,Request $request){


    if($request->file('image')){
        $file= $request->file('image');
        $filename= date('YmdHi').$file->getClientOriginalName();
        $file-> move(public_path('public/Image'), $filename);
        $request->image = 'public/Image/' . $filename;
      }
      else {
        $request->image = null;
      }

      $serverHost = 'http://127.0.0.1:8000';
      $request = Request::create('http://127.0.0.1:8000/api/update/'.$id,'POST',$request -> all());
      $response = Route::dispatch($request);
      return redirect('/home');
    
});

Route::get('delete/{post}',function($id){

      $serverHost = 'http://127.0.0.1:8000';
      $request = Request::create('http://127.0.0.1:8000/api/delete/'.$id,'POST');
      $response = Route::dispatch($request);
      return redirect('/home');

});

// Route::get('email/send',[MailController::class,'sendMail']);

// Route::get('testImage',function(){

//     $posts = Post::whereNull('image')->get();
//     foreach ($posts as $post){
//         $email = (User::find($post->user_id))->email;
//         Mail::to($email)->send(new welcomeMail());
        
//     }
// });


Route::get('testDate',function(){
    $user = User::first();
    dd($user);
});

