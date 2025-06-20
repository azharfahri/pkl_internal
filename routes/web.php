<?php

use App\Http\Controllers\LatihanController;
use App\Http\Controllers\SiswaController;
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
Route::get('siswa', [SiswaController::class, 'index'])->name('siswa.index');
Route::get('siswa/create', [SiswaController::class, 'create'])->name('siswa.create');
Route::post('siswa/store', [SiswaController::class, 'store'])->name('siswa.store');



Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
