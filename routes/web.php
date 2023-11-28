<?php

use App\Http\Controllers\BookingController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PropertyController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use App\Models\Property;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

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
//all properties
Route::get('/',[PropertyController::class, 'index']);
//Search  for properties
Route::get('/search',[PropertyController::class, 'search']);
//filter search

Route::get('/properties/create',[PropertyController::class, 'create'])->middleware('auth');
//show properties of user
Route::get('/properties/manage',[PropertyController::class, 'manage'])->middleware('auth');
//delete property
Route::delete('/properties/{property}',[PropertyController::class, 'destroy'])->middleware('auth');
//show one property
Route::get('/properties/{property}',[PropertyController::class, 'show'])->middleware('auth');
//create property
Route::post('/properties',[PropertyController::class, 'store'])->middleware('auth');
//show edit property form
Route::get('/properties/{property}/edit',[PropertyController::class, 'edit'])->middleware('auth');
//update property 
Route::put('/properties/{property}',[PropertyController::class, 'update'])->middleware('auth');
//show user form
Route::get('/users/register',[UserController::class, 'create'])->middleware('guest');
//create new user
Route::post('/users',[UserController::class, 'store']);
//login user
Route::post('/users/authenticate',[UserController::class,'authenticate']); 
//show login form
Route::get('/users/login',[UserController::class, 'login'])->name('login')->middleware('guest');
//logout user
Route::post('/logout',[UserController::class, 'logout'])->middleware('auth');


//Delete user booking
Route::delete('/bookings/{booking}',[BookingController::class, 'destroy'])->middleware('auth');
//create booking
Route::post('/bookings',[BookingController::class, 'createbooking'])->middleware('auth');
//show booking
Route::get('/bookings/mybooking',[BookingController::class, 'mybooking'])->middleware('auth');
//SHOW PROPERTY BOOKING
Route::get('/bookings/{property}/pbooking',[BookingController::class, 'pbooking'])->middleware('auth');
//delete pbooking
Route::delete('/bookings/{booking}/delete',[BookingController::class, 'delete'])->middleware('auth');

//show review form
Route::get('/reviews/{property}/pro_reviews',[ReviewController::class, 'show'])->middleware('auth');
//store reviews
Route::post('/reviews/{property}/pro_reviews',[ReviewController::class, 'store'])->middleware('auth');




