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
        return view('admin.products.index');
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

        session()->flash('success','محصول با موفقیت ایجاد شد');

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
           'cost' => $request->get('cost', $product->cost),
           'description' => $request->get('description', $product->description),
           ]);

           if ($request->has('file')){
               if (filled($product->file)){
                   Storage::delete($product->file->path.'/'.$product->file->name);
                   $product->file()->delete();
               }}
               $pic=$request->file('file');
               $path='public/products';
               $file=$this->uploadFile($pic , $path);
               $product->file()->save($file);
        session()->flash('success','محصول با موفقیت ویرایش شد');

    return redirect(route('products.index'));
    }

    public function destroy(Product $product)
    {
        $product->delete();
        session()->flash('success','محصول با موفقیت حذف شد');
        return redirect(route('products.index'));
    }
}
