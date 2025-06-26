<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class EcommerceController extends Controller
{
    public function index(){
        $category = Category::all();
        $product = Product::all();
        return view('welcome',  compact('category','product'));
    }
    public function createOrder(Request $request){

    }
    public function myOrders(){

    }
    public function orderDetail($id){

    }
    public function updateQuantity(Request $request){

    }
    public function removeItem(Request $request){

    }
    public function checkOut(Request $request){

    }
}
