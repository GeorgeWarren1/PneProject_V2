<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\dbController;
use App\Http\Controllers\PagesController;


//db route
Route::get('/managers/position/{value}/view', [dbController::class, 'getManagersByPosition']);
Route::get('/managers/view', [dbController::class, 'getManagersByPosition']);
Route::get('/storeInfo/view', [dbController::class, 'getStoreInfo']);





//pages route
Route::get('/cpanel',[PagesController::class,'cpanel']);
Route::get('/managerslist',[PagesController::class,'managerslist']);

//functions routes
Route::get('/concatenate-arrays', [dbController::class, 'showConcatenatedArrays']);




//delete later
Route::get('/', function () {
    return view('welcome');
});
