<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\DiscountRequest;
use App\Models\Discount;
use App\Models\Product;
use Illuminate\Http\Request;

class DiscountController extends Controller
{
    public function create(Product $product)
    {
        return view('admin.discounts.create',['product'=>$product]);
    }

    public function store(Product $product, DiscountRequest $request)
    {
        $product->addDiscount($request);
        session()->flash('success','تخفیف با موفقیت اختصاص داده شد');

        return redirect(route('products.index'));
    }

    public function destroy(Product $product)
    {
        $product->discount->delete();
        session()->flash('success','تخفیف با موفقیت حذف شد');
        return redirect(route('products.index'));
    }
}
