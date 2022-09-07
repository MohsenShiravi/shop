<?php

namespace App\Http\Controllers\client;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Dflydev\DotAccessData\Data;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $products=Product::all();

        return view('client.home',['products'=>$products]);
    }

    public function productDetails(Product $product)
    {



        return view('client.showProduct',['product'=>$product]);
     }
}
