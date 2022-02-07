<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ApiProduct;
use App\Http\Controllers\ApiPromo;
use App\Http\Controllers\ApiMember;

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
//API route for register new user
Route::post('/register', [App\Http\Controllers\API\AuthController::class, 'register']);
//API route for login user
Route::post('/login', [App\Http\Controllers\API\AuthController::class, 'login']);

//Protecting Routes
Route::group(['middleware' => ['auth:sanctum']], function () {
    Route::get('/profile', function(Request $request) {
        return auth()->user();
    });

    // API route for logout user
    Route::post('/logout', [App\Http\Controllers\API\AuthController::class, 'logout']);
    Route::get('/products',[ApiProduct::class,'index']);
    Route::get('/products/{id}',[ApiProduct::class,'show']);
    Route::post('/products',[ApiProduct::class,'store']);
    Route::get('/Auth/{id}',[Auth::class,'auth']);
    Route::put('/products/{id}',[ApiProduct::class,'update']);
    Route::delete('/products/{id}',[ApiProduct::class,'destroy']);
});

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::post('/log',[ApiMember::class,'login']);
Route::get('/promo',[ApiPromo::class,'index']);
Route::get('/promo/{id}',[ApiPromo::class,'show']);