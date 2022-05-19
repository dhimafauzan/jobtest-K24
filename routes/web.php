<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Credential\CredentialController;
use App\Http\Controllers\Credential\ProfileController;

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




Auth::routes();

Route::group(['middleware' => ['auth']], function () {

    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::get('/home/member', [App\Http\Controllers\HomeController::class, 'index'])->name('home.member');

    Route::get('response/json', [CredentialController::class, 'indexJson'])->name('json');
    Route::resource('users', CredentialController::class);
    Route::resource('profile', ProfileController::class);

});

Route::get('pendaftaran',[ CredentialController::class, 'regis'])->name('pendaftaran.regis');
Route::post('tambah-user',[ \App\Http\Controllers\Back\RegisController::class, 'storeRegis'])->name('store.regis');
