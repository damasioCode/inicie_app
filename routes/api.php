<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

//Users EndPoints
Route::get('/users', 'App\Http\Controllers\UserController@getAllUsers');
Route::post('/users', 'App\Http\Controllers\UserController@createUser');
Route::get('/users/{id}', 'App\Http\Controllers\UserController@getUser');
Route::post('/users/{id}/posts', 'App\Http\Controllers\UserController@createPost');

//Posts EndPoints
Route::post('/posts/{post_id}/comments', 'App\Http\Controllers\UserController@createComment');
Route::delete('/comments/{post_id}', 'App\Http\Controllers\UserController@deleteComment');
