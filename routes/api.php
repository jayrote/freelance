<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Api\UserApiController;
use App\Http\Controllers\Api\CategoryApiController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// get all category
Route::get('/allCategory', [CategoryApiController::class, 'index']);

// add User
Route::post('/user', [UserApiController::class, 'createUser']);


Route::middleware(['auth:sanctum'])->group(function () {

    // get Single user
    Route::get('/singleUser', [UserApiController::class, 'getSingleUSer']);

    // delete User
    Route::get('/remove', [UserApiController::class, 'deleteUser']);

    // Update User
    Route::post('/update', [UserApiController::class, 'updateUser']);
    
    // switch type
    Route::get('/switch_type', [UserApiController::class, 'switchUser']);

    //Dispute `add` Api
    // Route::post('/disputes', [DisputesApiController::class, 'createDispute']);
    
});


//gig api
// Route::post('/gig_store', [GigApiController::class, 'gigStore']);


//login Api
Route::post('/login', [UserApiController::class, 'login']);