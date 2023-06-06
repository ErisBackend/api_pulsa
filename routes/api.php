<?php

use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


//admin controller
use App\Http\Controllers\AdminController;
//riwayat controllers
use App\Http\Controllers\RiwayatController;

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
//route admins
Route::get('/admins',[AdminController::class,'index']);
Route::get('/admins/{id}',[AdminController::class,'show']);
Route::post('/admins',[AdminController::class,'store']);
Route::put('/admins/{id}',[AdminController::class,'update']);
Route::delete('/admins/{id}',[AdminController::class,'destroy']);

//route riwayat 

Route::get('/riwayats',[RiwayatController::class,'index']);
Route::post('/riwayats',[RiwayatController::class,'store']);
Route::get('/riwayats/{id}',[RiwayatController::class,'show']);
Route::put('/riwayats/{id}',[RiwayatController::class,'update']);
Route::delete('/riwayats/{id}',[RiwayatController::class,'destroy']);

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
