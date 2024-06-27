<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\dbController;

Route::get('/managers/position/{value}/view', [dbController::class, 'getManagersByPosition']);
Route::get('/managers/view', [dbController::class, 'getManagersByPosition']);
    
Route::get('/', function () {
    return view('welcome');
});
