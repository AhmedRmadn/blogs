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
    return auth()->user();
});

Route::get('/', function (Request $request) {
    return response()->json([
        'Posts' => Post::all(),
    ],200);

});
Route::get('show/{post}', function (Request $request,$id) {
    return response()->json([
        'Post' => Post::find($id),
    ],200);
});



Route::post('/update/{id}',[updatePost:: class , 'getUpdatedData']);
Route::post('/create',[createPostController:: class , 'createPost']);
Route::get('/delete/{id}',[deletePostController:: class , 'deletePost']);


Route::post('register', [authenticationController::class, 'register'])->middleware('guest');

Route::post('login', [authenticationController::class, 'login'])->middleware('guest');

Route::post('logout', [authenticationController::class, 'logout'])->middleware('auth');



