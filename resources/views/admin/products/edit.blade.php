@extends('admin.layout.master')


@section('content')

    <div class="row">
        <div class="col-sm-12">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">ایجاد محصول</h3>
                </div>
                <div class="box-body">
                    <form action="{{route('products.update', $product)}}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('PATCH')
                        <div class="form-group">
                            <label for="category_id">دسته بندی</label>
                            <select name="category_id" id="category_id" class="form-control">
                                <option value="" disabled selected>دسته بندی را انتخاب کنید</option>
                                @foreach($categories as $category)
                                    <option
                                        @if($product->category_id == $category->id)
                                            selected
                                        @endif
                                        value="{{$category->id}}">{{$category->title}}</option>
                                @endforeach
                            </select>
                        </div>



                        <div class="form-group">
                            <label for="name">نام</label>
                            <input type="text" class="form-control" name="name" id="name" value="{{$product->name}}">
                        </div>



                        <div class="form-group">
                            <label for="cost">قیمت</label>
                            <input type="number" class="form-control" name="cost" id="cost"  value="{{$product->cost}}">
                        </div>

                        <div class="form-group">
                            <div class="row">
                                <div class="col-sm-6">
                                    <label for="file">تصویر</label>
                                    <input type="file" name="file" id="file" class="from-control">
                                </div>
                                <div class="col-sm-6">
                                    <img src="{{$image}}" alt="">
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="description">توضیحات</label>
                            <textarea name="description" id="description" class="form-control">{{$product->description}}</textarea>
                        </div>

                        <div class="form-group">
                            <input type="submit" name="submit" id="submit" value="ثبت" class="btn btn-primary">
                        </div>
                    </form>
                </div>
            </div>
            @include('admin.layout.errors')
        </div>
    </div>

@endsection