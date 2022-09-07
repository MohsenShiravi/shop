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
                    <img src="{{asset('client/images/inner-banner/inner-banner7.png')}}" alt="Inner Banner">
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
                @foreach($category->getAllSubCategoryProducts() as $product)
                    <div class="col-lg-3 col-sm-6 mix smartphone">
                        <div class="arrival-product">
                            <div class="arrival-img">
                                <a href="{{route('showProduct',$product)}}">
                                    <img src="{{Storage::url($product->file->path.'/'.$product->file->name)}}" alt="{{$product->name}}" title="{{$product->name}}">
                                </a>
                                @if($product->has_discount)
                                    <div class="new-tag">
                                        <h3>تخفیف : {{$product->discount_value}}%</h3>
                                    </div>
                                @endif
                            </div>

                            <div class="content">
                                <h3><a href="{{route('showProduct',$product)}}">{{$product->name}}</a></h3>
                                <span>دسته بندی : {{$product->category->title}}</span>
                                <div class="price-tag">
                                    <h4>{{$product->cost_with_discount}} تومان @if($product->discount()->exists())<del>{{$product->cost}}</del> @endif </h4>
                                </div>

                                <div class="add-btn">
                                    <a href="{{route('showProduct',$product)}}" class="add-cart-btn">خرید</a>
                                </div>

                                <ul class="products-action">
                                    <li>
                                        <a id="like-{{$product->id}}" onClick="like({{$product->id}});" data-tooltip="tooltip" data-placement="top" title="افزودن در علاقه‌مندی‌ها"><i class='bx bx-heart @if($product->is_liked) like @endif'></i></a>
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