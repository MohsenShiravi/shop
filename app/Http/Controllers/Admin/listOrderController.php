<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class listOrderController extends Controller
{
    public function index()
    {
        if(Auth::user()->role('admin'))
        {
            $orders=Order::all();
        }
        else
        {
            $orders=Order::query()->where('user_id',Auth::id())->get();
        }
        return view('admin.orders.index',['orders'=>$orders]);
    }
}
