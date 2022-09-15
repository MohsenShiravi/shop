<?php

namespace App\Http\Controllers\client;
use Illuminate\Database\Eloquent\Factories\HasFactory;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Dflydev\DotAccessData\Data;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        return view('client.home');
    }

    public function productDetails(Product $product)
    {
        return view('client.showProduct',['product'=>$product]);
     }
}
