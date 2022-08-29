<?php

namespace App\Http\Controllers\client;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $categories=Category::query()->where('category_id','NULL')->get();
        return view('client.home',['categories'=>$categories]);
    }
}
