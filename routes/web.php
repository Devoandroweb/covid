<?php

use App\Http\Controllers\CAdmin;
use App\Http\Controllers\CDiagnosis;
use App\Http\Controllers\CLogin;
use App\Http\Controllers\CPengaduan;
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

Route::get('/admin',[CLogin::class,'index'])->middleware('guest');
Route::post('/auth',[CLogin::class,'auth']);

Route::middleware(['auth'])->group(function ()
{
    Route::get('/home',[CAdmin::class,'index']);
    Route::get('/logout',[CLogin::class,'logout']);

    Route::get('/diagnosis',[CDiagnosis::class,'index']);
    Route::get('/diagnosis/create',[CDiagnosis::class,'create']);
    Route::post('/diagnosis/create-save',[CDiagnosis::class,'create_save']);
    Route::get('/diagnosis/show/{id}',[CDiagnosis::class,'show']);
    Route::post('/diagnosis/show-save/{id}',[CDiagnosis::class,'show_save']);
    Route::get('/diagnosis/delete/{id}',[CDiagnosis::class,'delete']);
    Route::get('/diagnosis/print',[CDiagnosis::class,'print']);

});

Route::get('/',[CPengaduan::class,'index']);
Route::post('/pengaduan-save',[CPengaduan::class,'save']);
