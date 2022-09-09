<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{


    public function create()
    {
        return view('client.orders.create', [
            'items' => Cart::getItems(),
            'totalAmount' => Cart::totalAmount(),
            'totalItems' => Cart::totalItems()
        ]);
    }

    public function store(Request $request)
    {
        $order = Order::query()->create([
            'amount' => Cart::totalAmount(),
            'address' => $request->get('address'),
            'mobile' => $request->get('mobile'),
            'user_id' => auth()->id(),
        ]);

        foreach (Cart::getItems() as $item){

            $product = $item['product'];
            $productQty  = $item['quantity'];

            $order->details()->create([
                'product_id' => $product->id,
                'unit_amount' => $product->cost_with_discount,
                'count' => $productQty,
                'total_amount' => $productQty * $product->cost_with_discount
            ]);
        }
        Cart::removeAll();

        return redirect()->route('client.orders.index');
    }

    public function index()
    {
        $orders=Order::all();
        return view('client.orders.index',['orders'=>$orders]);

    }

    public function edit(Order $order)
    {
        return view('client.orders.transaction',['order'=>$order]);
    }

    public function transaction(Request $request, Order $order)
    {
        $order->update([
            'payment_status' =>$request->get('payment_status'),
            'transaction_id'=>rand()
        ]);

return redirect()->route('client.orders.index');
    }

}
