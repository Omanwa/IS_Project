<?php

use App\Http\Controllers\UserController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\ComplaintController;
use App\Http\Controllers\ImageController;
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
    return view('layout');

});

Route::get('admin', function () {
    return view('admindash');

});

Route::get('seller', function () {
    return view('sellerdash');

});

Route::get('buyer', function () {
    return view('buyer');

});

//////users routes//////
Route::post('authRegister',[UserController::class,'authRegister']);
Route::post('authLogin',[UserController::class,'authLogin']);
Route::get('login',[UserController::class,'login']);
Route::get('register',[UserController::class,'register']);
Route::get('users',[UserController::class,'all']);
Route::get('user/add',[UserController::class,'add']);
Route::post('user/save',[UserController::class,'save']);
Route::post('user/savechanges/{user_id}',[UserController::class,'savechanges']);
Route::get('user/edit/{user_id}',[UserController::class,'edit']);
Route::get('user/delete/{user_id}',[UserController::class,'delete']);

//////category routes/////
Route::get('categories',[CategoryController::class,'all']);
Route::get('category/add',[CategoryController::class,'add']);
Route::post('category/save',[CategoryController::class,'save']);
Route::post('category/savechanges/{category_id}',[CategoryController::class,'savechanges']);
Route::get('category/edit/{category_id}',[CategoryController::class,'edit']);
Route::get('category/delete/{category_id}',[CategoryController::class,'delete']);

//////Items routes/////
Route::get('items',[ItemController::class,'all']);
Route::get('item/add',[ItemController::class,'add']);
Route::post('item/save',[ItemController::class,'save']);
Route::post('item/savechanges/{item_id}',[ItemController::class,'savechanges']);
Route::get('item/edit/{item_id}',[ItemController::class,'edit']);
Route::get('item/delete/{item_id}',[ItemController::class,'delete']);
//Route::get('item/photos',[ItemController::class, 'images']);

//////Payment routes////
Route::get('payments',[PaymentController::class,'all']);
Route::get('payment/add',[PaymentController::class,'add']);
Route::post('payment/save',[PaymentController::class,'save']);

//////Complaint routes////
Route::get('complaints',[ComplaintController::class,'all']);
Route::get('complaint/add',[ComplaintController::class,'add']);
Route::post('complaint/save',[ComplaintController::class,'save']);


