<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Order;
use App\Models\OrderProduct;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;


class EcommerceController extends Controller
{
    public function index(){
        $category = Category::all();
        $product = Product::all();
        return view('welcome',  compact('category','product'));
    }

    public function createOrder(Request $request){
        try {
            DB::transaction(function () use ($request){
                $existingPendingOrder = Order::where('user_id', Auth::id())
                ->where('status','pending')
                ->latest()
                ->first();
                // jika tidak ada order pending, buat order baru

                if (!$existingPendingOrder) {
                    $order = Order::create([
                        'user_id' => Auth::id(),
                        'total_harga' => 0,
                        'status' => 'pending',
                    ]);
                }else {
                    $order = $existingPendingOrder;
                }
                $totalHarga = 0;
                if ($existingPendingOrder) {
                    $totalHarga = $existingPendingOrder->total_harga;
                }

                foreach ($request->items as $item) {
                    $product = Product::findOrFail($item['product_id']);
                    $subtotal = $product->harga * $item['quantity'];

                    $existingItem = OrderProduct::where('order_id', $order->id)
                    ->where('product_id', $product->id)
                    ->first();

                    if ($existingItem) {
                        $newQuantity = $existingItem->quantity + $item['quantity'];
                        $newSubtotal = $product->harga * $newQuantity;
                        $oldSubtotal = $existingItem->subtotal;

                        $existingItem->quantity = $newQuantity;
                        $existingItem->subtotal = $newSubtotal;
                        $existingItem->save();

                        $totalHarga = $totalHarga - $oldSubtotal + $newSubtotal ;
                    } else {
                        OrderProduct::create([
                            'order_id' => $order->id,
                            'product_id' => $product->id,
                            'quantity' => $item['quantity'],
                            'subtotal' => $subtotal,
                        ]);
                        $totalHarga += $subtotal;
                    }

                }
                $order->total_harga = $totalHarga;
                $order->save();
            });
            $productName = Product::findOrFail($request->items[0]['product_id'])->nama;
            $quantity = $request->items[0]['quantity'];
            return redirect()->route('home')->with('success' , "$quantity x $productName Berhasil Ditambahkan ke keranjang");
        } catch (\Exception $e) {
            return redirect()->route('home')->with('error', 'Error:' , $e->getMessage());
        }
    }

    public function myOrders(){

    }

    public function orderDetail($id){
        $order = Order::with(['orderProduct.product'])
        ->where('user_id', Auth::id())
        ->findOrFail($id);

        return view('orders.detail' , compact('order'));
    }

    public function updateQuantity(Request $request){

    }

    public function removeItem(Request $request){

    }

    public function checkOut(Request $request){
        try {
            return DB::transaction(function () use ($request){
                $order = Order::with('orderProduct.product')->findOrFail($request->order_id);

                if ($order->user_id !== Auth::id()) {
                    return redirect()->route('orders.my')->with('error', 'Akses tidak sah untuk pesanan ini');
                }

                if ($order->status === 'completed') {
                    return redirect()->route('orders.detail', $order->id)->with('error', 'Pesanan ini sudah selesai');

                }

                if ($order->orderProduct->isEmpty()) {
                    return redirect()->route('orders.my')->with('error', 'Tidak dapat melakukan checkout untuk pesanan ini');

                }

                // $insufficientStock = [];
                // foreach ($order->orderProduct as $item) {
                //     $product =
                // }
            });
        } catch (\Exception $e) {
            return redirect()->route('orders.my')
            ->with('error', 'Terjadi kesalahan saat checkout:' . $e->getMessage());
        }
    }
}
