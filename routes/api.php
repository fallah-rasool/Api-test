<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;

use App\Http\Controllers\Api\V1\PostController as V1PostController;
use App\Http\Controllers\Api\V2\PostController as V2PostController;



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

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });




// Route::get('posts',[PostController::class,'index'] );

// Route::post('posts',[PostController::class,'store'] );

// Route::put('posts/{post}',[PostController::class,'update']);

// Route::delete('posts/{post}',[PostController::class,'destroy']);

// Route::get('posts/{post}',[PostController::class,'show']);

// Route::apiResource('users',UserController::class);



Route::prefix('v1')->group(function () {

    Route::get('posts',[V1PostController::class,'index']);

    Route::get('posts/{post}',[V1PostController::class,'show']);

    Route::post('posts',[V1PostController::class,'store']);

    Route::put('posts/{post}',[V1PostController::class,'update']);

    Route::delete('posts/{post}',[V1PostController::class,'destroy']);

    Route::apiResource('users',UserController::class);

});


Route::prefix('v2')->group(function () {


    Route::get('posts',[V2PostController::class,'index']);

    Route::get('posts/{post}',[V2PostController::class,'show']);

    Route::post('posts',[V2PostController::class,'store']);

    Route::put('posts/{post}',[V2PostController::class,'update']);

    Route::delete('posts/{post}',[V2PostController::class,'destroy']);

    Route::apiResource('users',UserController::class);


});


