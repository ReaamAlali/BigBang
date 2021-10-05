<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\BookingController;

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


Route::post('login', [UserController::class,'login']);
Route::post('register', [UserController::class,'register']);
Route::group(['middleware' => 'auth:api'], function(){
Route::post('details', [UserController::class],'details');
});

/****
 * 
 * CURD Room
 * 
 */

Route::get('rooms', [RoomController::class,'index']);
Route::get('rooms/{id}', [RoomController::class,'show']);
Route::post('rooms', [RoomController::class,'store']);
Route::put('rooms/{id}', [RoomController::class,'update']);
Route::delete('rooms/{id}', [RoomController::class,'delete']);

/****
 * 
 * CURD Room
 * 
 */


Route::post('booking/{roomId}', [BookingController::class,'store']);


