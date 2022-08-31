<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductRequest;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\Product;
class ProductController extends Controller
{
    public function index()
    {
        return view('admin.products.index', [
            'products' => Product::query()->with('category')->get()
        ]);
    }

    public function create()
    {
        return view('admin.products.create', [
            'categories' => Category::all(),

        ]);
    }

    public function store(ProductRequest $request)
    {

        Product::query()->create([
            'name' => $request->get('name'),
            'category_id' => $request->get('category_id'),
            'cost' => $request->get('cost'),
            'description' => $request->get('description'),
        ]);
        return redirect(route('products.index'));
    }

    public function edit(Product $product)
    {
        return view('admin.products.edit', [
            'product' => $product,
            'categories' => Category::all(),
        ]);
    }

    public function update(ProductRequest $request,Product $product)
    {
           $product->update([
           'name' => $request->get('name', $product->name),
           'category_id' => $request->get('category_id', $product->category_id),
           'cost' => $request->get('cost', $product->price),
           'description' => $request->get('description', $product->description),
           ]);
    return redirect(route('products.index'));
    }

    public function destroy(Product $product)
    {
        $product->delete();

        return redirect(route('products.index'));
    }
}
