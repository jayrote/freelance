<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\SignInController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\BillController;
use App\Http\Controllers\GigsController;
use App\Http\Controllers\OrderController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('signin');
})->name('signin');

//register
Route::get('/register',[AdminController::class,'getRegister'])->name('register');

//registered
Route::post('/register',[AdminController::class,'Register'])->name('registered');

//login
Route::post('/loggedIn',[AdminController::class,'logIn'])->name('loggedIn');

//dashboard
Route::get('/dashboard',[DashboardController::class,'index'])->name('dashboard');

//users
Route::get('/user',[UserController::class,'index'])->name('user');

//get category
Route::get('/category',[CategoryController::class,'index'])->name('category');
Route::get('/category_create',[CategoryController::class,'create'])->name('category_create');

// add catagory
Route::post('/category_store',[CategoryController::class,'store'])->name('category_store');

// remove category
Route::get('/remove/{id}',[CategoryController::class,'removeCategory'])->name('remove');

//get single category
Route::get('/singleCategory/{id}',[CategoryController::class,'showSingleCategory'])->name('singleCategory');

//edit
Route::get('/edit/{id}',[CategoryController::class,'editCategory'])->name('edit');

//update
Route::post('/edit/{id}',[CategoryController::class,'updateCategory'])->name('update');

//profile edit
Route::get('/profile_edit',[UserController::class,'editProfile'])->name('editProfile');

//profile update
Route::post('/profile_edit',[UserController::class,'updateProfile'])->name('updateProfile');

//change password
Route::post('/change_password',[UserController::class,'changePassword'])->name('changePassword');

//get email page for check
Route::get('/checkEmail',[UserController::class,'checkEmail'])->name('checkEmail');

//check Email to forgot password
Route::post('/checkEmail',[UserController::class,'authenticateUserbyEmail'])->name('authenticateUserbyEmail');

//get forgot password
Route::post('/forgot_password',[UserController::class,'forgotPassword'])->name('forgot_pasword');

//gigs 
Route::get('/gigs',[GigsController::class,'index'])->name('gigs');

//Bills 
Route::get('/bills',[BillController::class,'index'])->name('bills');

//orders
Route::get('/orders',[OrderController::class,'index'])->name('orders');
