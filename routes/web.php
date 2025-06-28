<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\EcommerceController;
use App\Http\Controllers\LatihanController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SiswaController;
use App\Http\Middleware\isAdmin;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

// Route::get('/', function () {
//     return view('welcome');
// });

route::get('/',[EcommerceController::class , 'index'])->name('home');

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

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/testing', function () {
    return view('layouts.user');
});
Route::get('/latihan-js', function(){
    return view('latihan-js');
});

Route::resource('categories',CategoryController::class);

Route::group([
    'prefix' => 'admin',
    'as' => 'admin.',
    'middleware'=> ['auth', isAdmin::class]
], function (){
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
    Route::resource('category', CategoryController::class);
    Route::resource('product', ProductController::class);
});

Route::group([
    'middleware' => ['auth']
], function(){
    Route::post('/order',[EcommerceController::class,'createOrder'])->name('order.create');
    Route::post('/checkout',[EcommerceController::class,'checkOut'])->name('checkout');
    Route::get('/my-order',[EcommerceController::class,'myOrders'])->name('orders.my');
    Route::get('/my-order/{id}',[EcommerceController::class,'orderDetail'])->name('orders.detail');
    Route::post('/order/update-quantity',[EcommerceController::class,'updateQuantity'])->name('order.update-quantity');
    Route::post('/order/remove-item',[EcommerceController::class,'removeItem'])->name('order.remove-item');


}
);
