@extends('client.layout.master')
@section('content')
    <!-- Top Header Start -->
    <header class="top-header top-header-bg">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-7 col-md-7">
                    <div class="top-header-form">
                        <form>
                            <div class="row">
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <select class="form-control">
                                            <option>دسته‌بندی</option>
                                            <option>الکترونیکی</option>
                                            <option>کودک و نوزاد</option>
                                            <option>کفش و لباس</option>
                                            <option>سلامت و زیبایی</option>
                                            <option>سرگرمی و هنر</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-lg-8 pl-0">
                                    <div class="form-group search-form">
                                        <input type="search" class="form-control" placeholder="جستجو محصولات">
                                        <button type="submit">
                                            <i class="bx bx-search"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

                <div class="col-lg-5 col-md-5">
                    <div class="top-header-right">
                        <div class="phone-btn">
                            <span><i class='bx bx-mobile-alt'></i><a href="tel:+501-529-1747">+501-529-1747</a></span>
                        </div>

                        <div class="other-option">
                            <div class="option-item">
                                <div class="language-list">
                                    <select class="language-list-item">
                                        <option>English</option>
                                        <option>العربيّة</option>
                                        <option>Deutsch</option>
                                        <option>Português</option>
                                        <option>简体中文</option>
                                    </select>
                                </div>
                            </div>

                            <div class="option-item">
                                <div class="cart-btn-area">
                                    <a href="{{route('cart.index')}}" id="input-quantity" class="cart-btn"><i class='bx bx-cart'></i></a>
                                    <span class="total-items">{{\App\Models\Cart::totalItems()}}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!-- Top Header End -->

    <!-- End Navbar Area -->
    <div class="navbar-area">
        <!-- Menu For Mobile Device -->


        <!-- Menu For Desktop Device -->
        <div class="main-nav">

            <div class="container">
                <nav class="navbar navbar-expand-md navbar-light ">
                    <div class="collapse navbar-collapse mean-menu" id="navbarSupportedContent">
                        <ul class="navbar-nav m-auto">
                            <li class="nav-item">
                                <a href="{{route('index')}}" class="nav-link">
                                    صفحه اصلی
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="#" class="nav-link">
                                    دسته ها
                                    <i class='bx bx-chevron-down'></i>
                                </a>
                                <ul class="dropdown-menu">
                                    @foreach($categories as $category)
                                        <li class="nav-item">
                                            <a href="{{route('showCategory', $category)}}" class="nav-link">
                                                {{$category->title}}
                                                @if($category->children->count() > 0) <i class='bx bx-chevron-down'></i> @endif
                                            </a>
                                            <ul class="dropdown-menu">
                                                @foreach($category->children as $childCategory)
                                                    <li class="nav-item">
                                                        <a href="{{route('showCategory', $childCategory)}}" class="nav-link">
                                                            {{$childCategory->title}}
                                                            @if($childCategory->children->count() > 0) <i class='bx bx-chevron-down'></i> @endif
                                                        </a>
                                                        <ul class="dropdown-menu">
                                                            @foreach($childCategory->children as $subchildCategory)
                                                                <li class="nav-item">
                                                                    <a href="{{route('showCategory', $subchildCategory)}}" class="nav-link">
                                                                        {{$subchildCategory->title}}
                                                                    </a>
                                                                </li>
                                                            @endforeach
                                                        </ul>
                                                    </li>
                                                @endforeach
                                            </ul>
                                        </li>
                                    @endforeach
                                </ul>
                            </li>
                            @auth
                                <li class="nav-item"><a style="color:white" href="{{route('client.likes.index')}}">لیست علاقه مندی (<span style="color: lightgoldenrodyellow" id="likes_count">{{auth()->user()->likes()->count()}}</span>)</a></li>


                            @php $user=auth()->user(); @endphp

                            @if($user->role->hasPermission('view-dashboard'))
                                <li class="nav-item"><a  href="/panel">پنل مدیریت </a></li>
                            @endif
                            @endauth
                            <li class="nav-item"><a  href="{{route('cart.index')}}">سبد خرید
                                    <i class='bx bx-chevron-down'></i>
                                </a>
                                <ul class="dropdown-menu">
                                    <li>
                                        <table id="menu-cart" class="table">
                                            <tbody id="cart-table-body">
                                            @foreach(\App\Models\Cart::getItems() as $item)
                                                @php
                                                    $product = $item['product'];
                                                    $productQty = $item['quantity'];
                                                @endphp
                                                <tr class="cart-row-{{$product->id}}">
                                                    <td class="text-left"><a href="product.html">{{$product->name}}</a></td>
                                                    <td class="text-right">x {{$productQty}}</td>
                                                    <td class="text-right">{{number_format($product->cost_with_discount)}}  تومان</td>
                                                    <td class="text-center"><button class="btn btn-danger btn-xs remove" title="حذف" onClick="removeFromCart({{$product->id}})" type="button"><i class="fa fa-times"></i></button></td>
                                                </tr>
                                            @endforeach

                                            </tbody>
                                        </table>
                                    </li>
                                    <li>
                                        <div>
                                            <table class="table table-bordered">
                                                <tbody>
                                                <tr>
                                                    <td class="text-right"><strong>جمع کل</strong></td>
                                                    <td class="text-right"><span class="total-amount">{{\App\Models\Cart::totalAmount()}}</span> تومان</td>
                                                </tr>

                                                <tr>
                                                    <td class="text-right"><strong>قابل پرداخت</strong></td>
                                                    <td class="text-right"><span class="total-amount">{{\App\Models\Cart::totalAmount()}}</span> تومان</td>
                                                </tr>
                                                </tbody>
                                            </table>
                                            <p class="checkout"><a href="{{route('cart.index')}}" class="btn btn-primary"><i class="fa fa-shopping-cart"></i> مشاهده سبد</a>&nbsp;&nbsp;&nbsp;<a href="{{route('client.orders.create')}}" class="btn btn-primary"><i class="fa fa-share"></i> ثبت سفارش</a></p>
                                        </div>
                                    </li>
                                </ul>
                            </li>
                            <li class="nav-item-btn ">
                                <a href="{{route('login')}}" class="default-btn border-radius-5 btn-bg-one">وارد شوید</a>
                            </li>
                        </ul>
                        <div class="other-option">
                        <div class="option-item">
                            <div class="cart-btn-area">
                                <a href="{{route('cart.index')}}" id="input-quantity" class="cart-btn"><i style="color: white" class='bx bx-cart'></i></a>
                                <span class="total-items">{{\App\Models\Cart::totalItems()}}</span>
                            </div>
                        </div>
                        </div>
                        @if(!auth()->user())
                        <div class="nav-btn">
                            <a href="{{route('login')}}" class="default-btn border-radius-5 btn-bg-one">وارد شوید</a>
                        </div>
                        @else
                            <div class="nav-btn">
                                <a href="{{route('logout')}}" class="default-btn border-radius-5 btn-bg-one">خروج</a>
                            </div>
                        @endif
                    </div>
                </nav>
            </div>
        </div>
    </div>

<!-- Banner Area -->
<div class="banner-area">
    <div class="container-fluid">
        <div class="row align-items-center">
            <div class="col-lg-4">
                <div class="banner-content-area">
                    <div class="banner-content">
                        <h1> اسان ترین روش خرید انلاین را با ما تجربه کنید </h1>
                        <p>این یکی از بهترین روش های مناسب و مناسب برای خرید محصول با قیمت مناسب و مناسب است.</p>

                    </div>
                        <a href="{{route('index')}}" class="logo">
                            <img src="{{asset('client/images/logos/logo-1.png')}}" alt="Logo">
                        </a>
                    </div>

            </div>

            <div class="col-lg-8">
                <div class="banner-img-area">
                    <div class="banner-img">
                        <img src="{{asset('client/images/home-one/inner-banner1.png')}}" alt="Images">
                        <div class="banner-offer-tag">
                            <h3>60%</h3>
                            <span>پیشنهاد</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Banner Area End -->

<!-- Product New Arrival  -->
<section class="product-new-arrival pt-100 pb-70">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-3 col-md-3">
                <div class="section-title">
                    <h2>همه محصولات</h2>
                </div>
            </div>
        </div>
        <hr class="line-bottom">

        <div id="Container" class="row">
            @foreach($products as $product)
            <div class="col-lg-3 col-sm-6 mix smartphone">
                <div class="arrival-product">
                    <div class="arrival-img">
                        <a href="{{route('showProduct',$product)}}">
                            <img src="{{Storage::url($product->file->path.'/'.$product->file->name)}}" alt="{{$product->name}}" title="{{$product->name}}">
                        </a>
                        @if($product->has_discount)
                        <div class="new-tag">
                            <h3>تخفیف : {{$product->discount->value}}%</h3>
                        </div>
                        @endif
                    </div>

                    <div class="content">
                        <h3><a href="{{route('showProduct',$product)}}">{{$product->name}}</a></h3>
                        <span>دسته بندی : {{$product->category->title}}</span>
                        <div class="price-tag">
                            <h4>{{number_format($product->cost_with_discount)}} تومان @if($product->has_discount)<del>{{number_format($product->cost)}}</del> @endif </h4>
                        </div>

                        <div class="add-btn">
                            <button class="btn-primary" type="button" onClick="addToCart({{$product->id}});"><span style="color: white;background-color: red;border-radius: 5px;padding: 5px">افزودن به سبد</span></button>
                        </div>

                        <ul class="products-action">
                            <li>
                                <a id="like-{{$product->id}}" onClick="like({{$product->id}});" data-tooltip="tooltip"  data-placement="top" title="افزودن در علاقه‌مندی‌ها"><i class='bx bx-heart @if($product->is_liked) like @endif'></i></a>
                            </li>

                        </ul>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
<!-- Product New Arrival End -->

<!-- Product Category Area -->


                <!-- دسته‌بندی Area -->
                <div class="categories-area pt-100 pb-70">
                    <div class="container-fluid">
                        @foreach($categories as $category)

                        <div class="container-max">
                            <hr>
                            <div class="section-title">
                                <h2>{{$category->title}}</h2>
                            </div>

                            <div class="row pt-45">
                                @foreach($category->getAllSubCategoryProducts() as $product)
                                  <div class="col-lg-3 col-sm-6">
                                    <div class="product-card">
                                        <div class="product-card-img">
                                            <a href="{{route('showProduct',$product)}}">
                                                <img src="{{Storage::url($product->file->path.'/'.$product->file->name)}}" alt="{{$product->name}}" title="{{$product->name}}">
                                            </a>
                                            @if($product->discount()->exists())
                                            <div class="product-card-tag">
                                                <h3>تخفیف : {{$product->discount->value}}%</h3>
                                            </div>
                                            @endif
                                            <ul class="product-card-action">
                                                <li>
                                                    <a href="{{route('showProduct',$product)}}" ><i class='bx bx-cart'></i></a>
                                                </li>
                                                <li>
                                                    <a id="like-{{$product->id}}" onClick="like({{$product->id}});"><i class='bx bx-heart @if($product->is_liked) like @endif'></i></a>
                                                </li>
                                                <li>
                                                    <a href="#" data-toggle="modal" data-target="#productsQuickView">
                                                        <i class='bx bx-show-alt'></i>
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="content">
                                            <h3><a href="shop-details.html">{{$product->name}}</a></h3>
                                            <span>{{number_format($product->cost_with_discount)}} تومان @if($product->has_discount)<del>{{number_format($product->cost)}}</del> @endif </span>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>


<!-- Product Category Area End -->

<!-- Other Product Area End -->
<div class="other-product-area pt-100 pb-70">
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <div class="other-product-card">
                    <img src="{{asset('client/images/products/smart-tv.png')}}" alt="Images">
                    <div class="content">
                        <h3>تلویزیون <b>هوشمند</b></h3>
                        <span>حالا در 5 کی نتورک</span>
                    </div>

                    <div class="price-title">
                        <h2><sup>از <sup class="sup-text">99</sup></sup> 877  تومان</h2>
                    </div>
                </div>
            </div>

            <div class="col-lg-6">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="other-product-champaign">
                            <div class="content">
                                <span>شروع از</span>
                                <h2>80 تومان </h2>
                                <h3>خرید رایگان در کمپین</h3>
                            </div>
                            <div class="product-champaign-img">
                                <img src="{{asset('client/images/products/product-img1.png')}}" alt="Images">
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-12">
                        <div class="other-product-list">
                            <i class='bx bx-shopping-bag'></i>
                            <h3> تخفیف خرید </h3>
                            <p>
                                این یکی از بزرگترین و بزرگترین فروش بهترین محصولات این محصول است.
                                شما به راحتی می توانید این محصول را از یک پیشنهاد ویژه خریداری کنید و این واقعاً موثر است.
                            </p>
                            <a href="#" class="default-btn border-radius-5">شروع کنید</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Other Product Area End -->

<!-- Choose Area -->
<div class="choose-area pb-70">
    <div class="container">
        <div class="section-title text-center">
            <h2> چرا ما را انتخاب کنید </h2>
        </div>
        <div class="row pt-45">
            <div class="col-lg-4 col-sm-6">
                <div class="choose-card">
                    <i class="flaticon-return"></i>
                    <h3> بازگشت آسان </h3>
                    <p>
                        بازگشت 20 روزه بدون پرسش و سوال ، با خیال راحت. این یکی از بهترین پیشنهادات برای شما است.
                    </p>
                </div>
            </div>

            <div class="col-lg-4 col-sm-6">
                <div class="choose-card">
                    <i class="flaticon-verified"></i>
                    <h3> پرداخت امن </h3>
                    <p>
                        بازگشت 20 روزه بدون پرسش و سوال ، با خیال راحت. این یکی از بهترین پیشنهادات برای شما است.
                    </p>
                </div>
            </div>

            <div class="col-lg-4 col-sm-6 offset-lg-0 offset-sm-3">
                <div class="choose-card">
                    <i class="flaticon-planet-earth"></i>
                    <h3> خرید جهانی </h3>
                    <p>
                        بازگشت 20 روزه بدون پرسش و سوال ، با خیال راحت. این یکی از بهترین پیشنهادات برای شما است.
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Choose Area End -->

<!-- Product Offer Area -->
<div class="product-offer-area">
    <div class="container-fluid">
        <div class="section-max-bg pt-100 pb-70">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-5">
                        <div class="offer-card">
                            <h2>این یکی از بزرگترین پیشنهادات است</h2>
                            <h3>330 تومان<del>500 تومان</del></h3>
                            <p>این یکی از بزرگترین و بزرگترین فروش این بهترین محصول است. شما به راحتی می توانید این محصول را از یک پیشنهاد ویژه خریداری کنید و این واقعاً موثر است.</p>
                            <div id="timer">
                                <div id="days"></div>
                                <div id="hours"></div>
                                <div id="minutes"></div>
                                <div id="seconds"></div>
                            </div>
                            <a href="shop-details.html" class="default-btn btn-bg-one border-radius-5">خرید</a>
                        </div>
                    </div>

                    <div class="col-lg-7">
                        <div class="offer-slider owl-carousel owl-theme">
                            <div class="offer-img-item">
                                <img src="{{asset('client/images/offer-img/offer-img1.jpg')}}" alt="Offer Images">
                                <div class="offer-tag">
                                    <h3>60%</h3>
                                    <span>پیشنهاد</span>
                                </div>
                            </div>

                            <div class="offer-img-item">
                                <img src="{{asset('client/images/offer-img/offer-img2.jpg')}}" alt="Offer Images">
                                <div class="offer-tag">
                                    <h3>50%</h3>
                                    <span>پیشنهاد</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Product Offer Area End -->

<!-- Best Sell Area -->
<div class="best-sell-area pt-100 pb-70">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-8 col-md-6">
                <div class="section-title">
                    <h2>محصولات پرفروش</h2>
                </div>
            </div>

            <div class="col-lg-4 col-md-6">
                <div class="product-search-form">
                    <input type="search" class="form-control" placeholder="جستجو محصولات">
                    <button type="submit">
                        <i class="bx bx-search"></i>
                    </button>
                </div>
            </div>
        </div>

        <div class="row pt-45">
            <div class="col-lg-3 col-sm-6">
                <div class="best-sell-card">
                    <div class="best-sell-img">
                        <a href="shop-details.html">
                            <img src="{{asset('client/images/products/best-sell-product1.png')}}" alt="تصویر محصول">
                        </a>
                        <div class="new-tag">
                            <h3>جدید</h3>
                        </div>
                    </div>

                    <div class="content">
                        <h3><a href="shop-details.html">هیرز 7.5 کیلوگرم قسطی</a></h3>
                        <span>کد محصول # 47GN10HU</span>
                        <div class="price-tag">
                            <h4>129 تومان<del>159 تومان</del></h4>
                        </div>

                        <div class="add-btn">
                            <a href="shop-details.html" class="add-cart-btn">خرید</a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-sm-6">
                <div class="best-sell-card">
                    <div class="best-sell-img">
                        <a href="shop-details.html">
                            <img src="{{asset('client/images/products/best-sell-product2.png')}}" alt="تصویر محصول">
                        </a>
                        <div class="new-tag">
                            <h3>جدید</h3>
                        </div>
                    </div>

                    <div class="content">
                        <h3><a href="shop-details.html">دی اس تلویزیون</a></h3>
                        <span>کد محصول # 57GN10HU</span>
                        <div class="price-tag">
                            <h4>149 تومان<del>169 تومان</del></h4>
                        </div>

                        <div class="add-btn">
                            <a href="shop-details.html" class="add-cart-btn">خرید</a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-sm-6">
                <div class="best-sell-card">
                    <div class="best-sell-img">
                        <a href="shop-details.html">
                            <img src="{{asset('client/images/products/best-sell-product3.png')}}" alt="تصویر محصول">
                        </a>
                        <div class="new-tag">
                            <h3>جدید</h3>
                        </div>
                    </div>

                    <div class="content">
                        <h3><a href="shop-details.html">رنجز التی دی یخچال</a></h3>
                        <span>کد محصول # 57GN10HU</span>
                        <div class="price-tag">
                            <h4>1400 تومان<del>1600 تومان</del></h4>
                        </div>

                        <div class="add-btn">
                            <a href="shop-details.html" class="add-cart-btn">خرید</a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-sm-6">
                <div class="best-sell-card">
                    <div class="best-sell-img">
                        <a href="shop-details.html">
                            <img src="{{asset('client/images/products/best-sell-product4.png')}}" alt="تصویر محصول">
                        </a>
                        <div class="new-tag">
                            <h3>جدید</h3>
                        </div>
                    </div>

                    <div class="content">
                        <h3><a href="shop-details.html">الکتریک ایکس فالکس</a></h3>
                        <span>کد محصول # 57GN10HU</span>
                        <div class="price-tag">
                            <h4>200 تومان<del>300 تومان</del></h4>
                        </div>

                        <div class="add-btn">
                            <a href="shop-details.html" class="add-cart-btn">خرید</a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-sm-6">
                <div class="best-sell-card">
                    <div class="best-sell-img">
                        <a href="shop-details.html">
                            <img src="{{asset('client/images/products/best-sell-product5.png')}}" alt="تصویر محصول">
                        </a>
                        <div class="new-tag">
                            <h3>جدید</h3>
                        </div>
                    </div>

                    <div class="content">
                        <h3><a href="shop-details.html">چایساز میکسر</a></h3>
                        <span>کد محصول # 67GN10HU</span>
                        <div class="price-tag">
                            <h4>1000 تومان<del>1400 تومان </del></h4>
                        </div>

                        <div class="add-btn">
                            <a href="shop-details.html" class="add-cart-btn">خرید</a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-sm-6">
                <div class="best-sell-card">
                    <div class="best-sell-img">
                        <a href="shop-details.html">
                            <img src="{{asset('client/images/products/best-sell-product6.png')}}" alt="تصویر محصول">
                        </a>
                        <div class="new-tag">
                            <h3>جدید</h3>
                        </div>
                    </div>

                    <div class="content">
                        <h3><a href="shop-details.html">الکترونیک مینی میکسر</a></h3>
                        <span>کد محصول # 67GN40HU</span>
                        <div class="price-tag">
                            <h4>220 تومان<del>200 تومان</del></h4>
                        </div>

                        <div class="add-btn">
                            <a href="shop-details.html" class="add-cart-btn">خرید</a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-sm-6">
                <div class="best-sell-card">
                    <div class="best-sell-img">
                        <a href="shop-details.html">
                            <img src="{{asset('client/images/products/best-sell-product7.png')}}" alt="تصویر محصول">
                        </a>
                        <div class="new-tag">
                            <h3>جدید</h3>
                        </div>
                    </div>

                    <div class="content">
                        <h3><a href="shop-details.html">پیروت واتر کاسر</a></h3>
                        <span>کد محصول # 67GN40HU</span>
                        <div class="price-tag">
                            <h4>210 تومان<del>220 تومان</del></h4>
                        </div>

                        <div class="add-btn">
                            <a href="shop-details.html" class="add-cart-btn">خرید</a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-sm-6">
                <div class="best-sell-card">
                    <div class="best-sell-img">
                        <a href="shop-details.html">
                            <img src="{{asset('client/images/products/best-sell-product8.png')}}" alt="تصویر محصول">
                        </a>
                        <div class="new-tag">
                            <h3>جدید</h3>
                        </div>
                    </div>

                    <div class="content">
                        <h3><a href="shop-details.html">میکرو اون سمی</a></h3>
                        <span>کد محصول # 57GN30HU</span>
                        <div class="price-tag">
                            <h4>888 تومان<del>900 تومان</del></h4>
                        </div>

                        <div class="add-btn">
                            <a href="shop-details.html" class="add-cart-btn">خرید</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Best Sell Area End -->

<!-- Blog Area -->
<div class="blog-area pb-70">
    <div class="container">
        <div class="section-title text-center">
            <h2>بلاگ ما</h2>
        </div>

        <div class="row pt-45">
            <div class="col-lg-4 col-md-6">
                <div class="blog-card">
                    <div class="blog-img">
                        <a href="blog-details.html">
                            <img src="{{asset('client/images/blog/blog-img1.jpg')}}" alt="Blog Images">
                        </a>
                        <div class="blog-date">27 آذر</div>
                    </div>

                    <div class="content">
                        <h3><a href="blog-details.html">در اپل واچ در مارکت 25٪ تخفیف بگیرید</a></h3>
                        <p>لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است.</p>
                        <a href="blog-details.html" class="read-btn">بیشتر بخوانید</a>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 col-md-6">
                <div class="blog-card">
                    <div class="blog-img">
                        <a href="blog-details.html">
                            <img src="{{asset('client/images/blog/blog-img2.jpg')}}" alt="Blog Images">
                        </a>
                        <div class="blog-date">29 آذر</div>
                    </div>

                    <div class="content">
                        <h3><a href="blog-details.html">چرخ دنده های بازی می توانند در محدوده قیمت مناسب خریداری کنند</a></h3>
                        <p>لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است.</p>
                        <a href="blog-details.html" class="read-btn">بیشتر بخوانید</a>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 col-md-6 offset-lg-0 offset-md-3">
                <div class="blog-card">
                    <div class="blog-img">
                        <a href="blog-details.html">
                            <img src="{{asset('client/images/blog/blog-img3.jpg')}}')}}" alt="Blog Images">
                        </a>
                        <div class="blog-date">25 آذر</div>
                    </div>

                    <div class="content">
                        <h3><a href="blog-details.html">بیایید با یک ساعت مچی مارک جدید آشنا شویم</a></h3>
                        <p>لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است.</p>
                        <a href="blog-details.html" class="read-btn">بیشتر بخوانید</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Blog Area End -->

@endsection