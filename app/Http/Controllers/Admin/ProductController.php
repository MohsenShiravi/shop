<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductRequest;
use App\Models\Category;
use App\Models\File;
use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    public function index()
    {
        $products=Product::query()->with('category')->get();
        return view('admin.products.index', ['products'=>$products]);
    }

    public function create()
    {
        return view('admin.products.create', [
            'categories' => Category::all(),

        ]);
    }

    public function store(ProductRequest $request)
    {
        $product=Product::query()->create([
            'name' => $request->get('name'),
            'category_id' => $request->get('category_id'),
            'cost' => $request->get('cost'),
            'description' => $request->get('description'),
        ]);
        if ($request->has('file')){
            $pic=$request->file('file');
            $path='public/products';
            $file=$this->uploadFile($pic , $path);
        }
        $product->file()->save($file);
        return redirect(route('products.index'));
    }

    public function edit(Product $product)
    {
        $img=$product->file;
        $image=Storage::url($img->path.'/'.$img->name);

        return view('admin.products.edit', [
            'image'=>$image,
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

    public function uploadFile($file , $path)
    {
        $FileName=time() . '_' .$file->getClientOriginalName();
        $file->storeAs($path , $FileName);

        return new File([
            'name'=>$FileName,
            'path'=>$path,
            'size'=>$file->getSize(),
            'mime_type'=>$file->getMimeType(),
        ]);
    }
}
