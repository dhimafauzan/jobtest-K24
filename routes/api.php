<?php

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

Route::group(['namespace' => 'Api',], function(){
    Route::post('register', [\App\Http\Controllers\Api\UserController::class, 'register']);
    Route::post('login', [ \App\Http\Controllers\Api\UserController::class, 'login']);
    Route::get('user', [\App\Http\Controllers\Api\UserController::class, 'getAuthenticatedUser'])->middleware('jwt.verify');


    Route::get('books', [\App\Http\Controllers\Api\BukuController::class, 'index']);
    Route::get('books/{id}', [\App\Http\Controllers\Api\BukuController::class, 'show']);
    Route::post('books', [\App\Http\Controllers\Api\BukuController::class, 'store']);
    Route::put('books/{id}', [\App\Http\Controllers\Api\BukuController::class, 'update']);
    Route::delete('books/{id}', [\App\Http\Controllers\Api\BukuController::class, 'destroy']);
});
