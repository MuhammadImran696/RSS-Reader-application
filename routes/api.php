<?php

use App\Http\Controllers\PostController;
use App\Http\Controllers\URLController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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
    return $request->user();
});

Route::get('/url',[URLController::class,'list']);
Route::post('/url',[URLController::class,'store']);
Route::get('/url/{id}',[URLController::class,'show']);
Route::put('/url/{id}',[URLController::class,'update']);
Route::delete('/url/{id}',[URLController::class,'destroy']);
Route::post('/posts',[PostController::class,'GetPosts']);
// Route::post('/url',[URLController::class,'store']);
