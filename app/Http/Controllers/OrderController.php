<?php

namespace App\Http\Controllers;

use App\Events\OrderTransaction;
use App\Http\Requests\OrderRequest;
use App\Models\Cart;
use App\Models\Offer;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

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

    public function store(OrderRequest $request)
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


        return redirect()->route('client.orders.index');
    }

    public function index()
    {
        $user=Auth::id();
        $orders=Order::query()->where('user_id',$user)->get();
        return view('client.orders.index',['orders'=>$orders]);

    }

    public function edit(Order $order)
    {
        return view('client.orders.transaction',['order'=>$order]);
    }

    public function transaction(Request $request, Order $order)
    {
        /*$offer=Offer::query()->where('code',$request->get('code'))->where('starts_at',"<" ,now())->where('starts_at', now())->where('expires_at',">" ,now())->get();
        if ($offer){
            $amount=$order->amount - $order->amount * $offer->value /100;
            $order->update([
                'amount'=>$amount
            ]);
        }*/
        $order->update([
            'payment_status' =>$request->get('payment_status'),
            'transaction_id'=>rand()
        ]);
        Cart::removeAll();
        event(new OrderTransaction());
        return redirect()->route('client.orders.index');
    }

}
