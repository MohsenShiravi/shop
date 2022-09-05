<?php

namespace App\Http\Controllers\client;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class LikeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('client.likes.index', [
            'products' => auth()->user()->likes
        ]);
    }

    public function store(Product $product)
    {
        auth()->user()->like($product);

        return response(['likes_count' => auth()->user()->likes()->count()], 200);
    }

    public function destroy(Product $product)
    {
        auth()->user()->likes()->detach($product);

        return back();
    }
}
