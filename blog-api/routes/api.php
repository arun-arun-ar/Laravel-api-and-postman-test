<?php

use App\Models\Blog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BlogController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('blogs',[BlogController::class,'index']);
Route::post('blogs',[BlogController::class,'store']);
Route::get('blogs/{blog}',[BlogController::class,'show']);
Route::put('blogs/{blog}',[BlogController::class,'update']);
Route::delete('blogs/{blog}',[BlogController::class,'destroy']);