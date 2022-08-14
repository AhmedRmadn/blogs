<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\Post;
use App\Http\Controllers\updatePost;
use App\Http\Controllers\deletePostController;
use App\Http\Controllers\createPostController;
use App\Http\Controllers\imageController;
use App\Http\Controllers\authenticationController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\PostController;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return auth()->user()->posts;
});

Route::get('/', function (Request $request) {
    return response()->json([
        'posts' => Post::all(),
    ],200);

});
Route::get('show/{post}', function (Request $request,$id) {
    return response()->json([
        'post' => Post::find($id),
    ],200);
});




Route::post('/update/{id}',[PostController:: class , 'updatePost'])->middleware('auth:sanctum');
Route::post('/create',[PostController:: class , 'createPost'])->middleware('auth:sanctum');
Route::post('/delete/{id}',[PostController:: class , 'deletePost'])->middleware('auth:sanctum');


Route::post('register', [authenticationController::class, 'register'])->middleware('guest');

Route::post('login', [authenticationController::class, 'login'])->middleware('guest');

Route::get('logout', [authenticationController::class, 'logout'])->middleware('auth');

Route::get('test', function(){
          return  response()->json(["data" => 'hello']);
});



