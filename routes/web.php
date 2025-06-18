<?php

use App\Http\Controllers\LatihanController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

//routing dasar
Route::get('/sample',function(){
    return "halo";
});
Route::get('/sample2', function(){
    return view('sample2');
});

//routing, controller & view dasar
Route::get('/sample3', [LatihanController::class, 'index']);
