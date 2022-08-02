<?php

use Illuminate\Support\Facades\Route;
use App\Models\Post;
use App\Http\Controllers\updatePost;
use App\Http\Controllers\deletePostController;
use App\Http\Controllers\createPostController;

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

Route::get('/', function () {
    
    return view('posts',["posts" => Post::all()]);
});


Route::get('show/{post}', function ($id) {
    
    return view('post',["post"=> Post::find($id)]);
});

Route::get('/update/{post}', function ($id) {
    
    return view('update',["post"=> Post::find($id)]);
});

Route::get('/create', function () {
    
    return view('createPost');
});

Route::post('/action/{id}',[updatePost:: class , 'getUpdatedData']);
Route::post('/create',[createPostController:: class , 'createPost']);
Route::get('/delete/{id}',[deletePostController:: class , 'deletePost']);