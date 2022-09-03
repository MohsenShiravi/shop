@extends('client.layout.master')
@section('content')
@include('client.layout.navbar')
<!-- Inner Banner Area -->
<div class="inner-banner-area">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6">
                <div class="inner-banner-content">
                    <h2>محصولات دسته بندی ‌{{$category->title}}</h2>
                    <ul>
                        <li><a href="{{route('index')}}">خانه</a></li>

                    </ul>
                </div>
            </div>

            <div class="col-lg-6">
                <div class="inner-banner-img">
                    <img src="/client/images/inner-banner/inner-banner7.png" alt="Inner Banner">
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Inner Banner Area End -->

<!-- دسته‌بندی Area -->
<div class="categories-area pt-100 pb-70">
    <div class="container-fluid">
        <div class="container-max">
            <div class="section-title">
                <h2>دسته بندی : {{$category->title}}</h2>
            </div>
            <hr>
            <div id="Container" class="row">
                @foreach($cats as $product)
                    <div class="col-lg-3 col-sm-6 mix smartphone">
                        <div class="arrival-product">
                            <div class="arrival-img">
                                <a href="shop-details.html">
                                    <img src="{{Storage::url($product->file->path.'/'.$product->file->name)}}" alt="تصویر محصول">
                                </a>
                                <div class="new-tag">
                                    <h3>جدید</h3>
                                </div>
                            </div>

                            <div class="content">
                                <h3><a href="shop-details.html">{{$product->name}}</a></h3>
                                <span>دسته بندی : {{$product->category->title}}</span>
                                <div class="price-tag">
                                    <h4>{{$product->cost}} تومان</h4>
                                </div>

                                <div class="add-btn">
                                    <a href="shop-details.html" class="add-cart-btn">خرید</a>
                                </div>

                                <ul class="products-action">
                                    <li>
                                        <a href="#" data-tooltip="tooltip" data-placement="top" title="افزودن در علاقه‌مندی‌ها"><i class='bx bx-heart'></i></a>
                                    </li>
                                    <li>
                                        <a href="#" data-tooltip="tooltip" data-placement="top" title="نمایش سریع" data-toggle="modal" data-target="#productsQuickView">
                                            <i class='bx bx-show-alt'></i>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            </div>
        </div>
    </div>
</div>
<!-- دسته‌بندی Area End -->

@endsection