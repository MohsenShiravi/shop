<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryRequest;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Factory|View
     */
    public function index()
    {
        return view('admin.categories.index', [
            'categories' => Category::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Factory|View
     */
    public function create()
    {
        return view('admin.categories.create', [
            'categories' => Category::all(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param CategoryRequest $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(CategoryRequest $request)
    {
         Category::query()->create([
            'title' => $request->get('title'),
            'category_id' => $request->get('category_id')
        ]);
         session()->flash('success','دسته بندی با موفقیت ایجاد شد');

        return redirect()->route('categories.index');
    }

    public function show(Category $category)
    {
        return view('client.showCategory',['category'=>$category]);
    }

    public function edit(Category $category)
    {
        return view('admin.categories.edit', [
            'category' => $category,
            'categories' => Category::all(),
        ]);
    }


    public function update(Request $request, Category $category)
    {
        $category->update([
            'category_id' => $request->get('category_id'),
            'title' => $request->get('title')
        ]);

        session()->flash('success','دسته بندی با موفقیت ویرایش شد');
        return redirect(route('categories.index'));
    }


    public function destroy(Category $category)
    {

        $category->delete();
        session()->flash('success','دسته بندی با موفقیت حذف شد');
        return redirect()->route('categories.index');
    }
}
