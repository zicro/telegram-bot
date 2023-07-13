<?php

use App\Http\Controllers\TelegramController;
use Illuminate\Support\Facades\Route;

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
    return view('welcome');
});

Route::get('updt_activity',[TelegramController::class,'updatedActivity'])->name('telegram.activity');
Route::get('/',[TelegramController::class,'sendMessage'])->name('telegram.send.msg');
Route::post('send_message',[TelegramController::class,'storeMessage'])->name('telegram.store.msg');
Route::post('store_photo',[TelegramController::class,'storePhoto'])->name('telegram.store.photo');
