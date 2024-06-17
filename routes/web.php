<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\registerController;

Route::get('/', function () {
    return view('welcome');
});

Route::post('/register',[registerController::class,'create']);
