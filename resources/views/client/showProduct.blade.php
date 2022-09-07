@extends('client.layout.master')
@section('content')
    @include('client.layout.navbar')
<!-- Inner Banner Area -->
<div class="inner-banner-area">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6">
                <div class="inner-banner-content">
                    <h2>جزئیات محصول : {{$product->name}}</h2>
                    <ul>
                        <li><a href="{{route('index')}}">خانه</a></li>
                        <li><i class='bx bx-chevron-left'></i></li>
                        <li><a href="shop-details.html" class="active">جزییات محصول</a></li>
                    </ul>
                </div>
            </div>

            <div class="col-lg-6">
                <div class="inner-banner-img">
                    <img src="{{asset('client/images/inner-banner/inner-banner6.png')}}" alt="Inner Banner">
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Inner Banner Area End -->

<!-- Product Details Area -->
<div class="product-details-area pt-100 pb-70">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-md-12">
                <div class="product-detls-image">
                    <img src="{{Storage::url($product->file->path.'/'.$product->file->name)}}" alt="{{$product->name}}" title="{{$product->name}}">
                </div>
            </div>

            <div class="col-lg-6 col-md-12">

                <form class="product-desc">
                    <h3>{{$product->name}}</h3>
                    <div class="price">
                        <span class="new-price">{{$product->cost_with_discount}} تومان </span>
                        @if($product->has_discount)
                        <span class="old-price">{{$product->cost}}</span>
                        @endif
                    </div>
                    <p>
                        {{$product->description}}                    </p>

                    <div class="input-count-area">
                        <label class="control-label" for="quantity">تعداد</label>
                        <div class="input-counter">
                            <input type="number" name="quantity" value="1" size="2" id="input-quantity" class="form-control" />
                        </div>
                    </div>
                        <div class="product-add-btn">
                        <button type="button" id="button-cart" onclick="addToCart({{$product->id}});" class="default-btn btn-bg-three" >
                            <i class="fas fa-cart-plus"></i> افزودن به سبد خرید
                        </button>
                            <button type="submit" class="default-btn btn-bg-three">
                                <a href="{{route('cart.index')}}">  رفتن به سبد خرید</a>
                            </button>
                    </div><br>


                    <div >
                        <ul> <li>
                                <a id="like-{{$product->id}}" onClick="like({{$product->id}});" data-tooltip="tooltip" data-placement="top" title="افزودن در علاقه‌مندی‌ها">افزودن در علاقه‌مندی‌ها<i class='bx bx-heart'></i></a>
                            </li></ul>
                    </div>
                    <div class="product-add-btn">

                    </div>
                </form>
        </div>
    </div>
</div>
<!-- Product Details Area End -->

<!-- Product Tab -->
<div class="product-tab pt-100 pb-70">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12">
                <div class="tab products-details-tab">
                    <div class="row">
                        <div class="col-lg-12 col-md-12">
                            <ul class="tabs">
                                <li>
                                    <a href="#">
                                        توضیحات
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        نظرات
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        اطلاعات ارسال
                                    </a>
                                </li>
                            </ul>
                        </div>

                        <div class="col-lg-12 col-md-12">
                            <div class="tab_content current active">
                                <div class="tabs_item current">
                                    <div class="products-tabs-decs">
                                        <p>لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است. چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم است و برای شرایط فعلی تکنولوژی مورد نیاز و کاربردهای متنوع با هدف بهبود ابزارهای کاربردی می باشد. کتابهای زیادی در شصت و سه درصد گذشته، حال و آینده شناخت فراوان جامعه و متخصصان را می طلبد تا با نرم افزارها شناخت بیشتری را برای طراحان رایانه ای علی الخصوص طراحان خلاقی و فرهنگ پیشرو در زبان فارسی ایجاد کرد. در این صورت می توان امید داشت که تمام و دشواری موجود در ارائه راهکارها و شرایط سخت تایپ به پایان رسد وزمان مورد نیاز شامل حروفچینی دستاوردهای اصلی و جوابگوی سوالات پیوسته اهل دنیای موجود طراحی اساسا مورد استفاده قرار گیرد.</p>
                                    </div>
                                </div>

                                <div class="tabs_item">
                                    <div class="products-tabs-reviews">
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="products-review-tab">
                                                    <ul>
                                                        <li>
                                                            <img src="{{asset('client/images/blog/blog-profile1.jpg')}}" alt="Image">
                                                            <h3>مگان فاکس</h3>
                                                            <span><i class='bx bx-calendar-event'></i>  آذر 02, 1399, 12:10 بعدازظهر </span>
                                                            <p>
                                                                لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است. چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم است و برای شرایط فعلی تکنولوژی مورد نیاز و کاربردهای متنوع با هدف بهبود ابزارهای کاربردی می باشد.
                                                            </p>
                                                            <div class="content">
                                                                <h4><a href="#"> لایک</a></h4>
                                                                <h4><a href="#"> پاسخ </a></h4>
                                                            </div>
                                                        </li>

                                                        <li>
                                                            <img src="{{asset('client/images/blog/blog-profile2.jpg')}}" alt="Image">
                                                            <h3>مایک توماس</h3>
                                                            <span><i class='bx bx-calendar-event'></i>  آذر 02, 1399, 11:30 بعدازظهر </span>
                                                            <p>
                                                                لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است. چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم است و برای شرایط فعلی تکنولوژی مورد نیاز و کاربردهای متنوع با هدف بهبود ابزارهای کاربردی می باشد.
                                                            </p>
                                                            <div class="content">
                                                                <h4><a href="#"> لایک</a></h4>
                                                                <h4><a href="#"> پاسخ </a></h4>
                                                            </div>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>

                                            <div class="col-lg-6">
                                                <div class="reviews-form">
                                                    <div class="contact-form">
                                                        <h3>افزودن نظر</h3>
                                                        <p>لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است. </p>
                                                        <div class="rating">
                                                            <i class='bx bxs-star'></i>
                                                            <i class='bx bxs-star'></i>
                                                            <i class='bx bxs-star'></i>
                                                            <i class='bx bxs-star'></i>
                                                            <i class='bx bxs-star-half'></i>
                                                        </div>
                                                        <form id="contactForm">
                                                            <div class="row">
                                                                <div class="col-lg-6 col-sm-6">
                                                                    <div class="form-group">
                                                                        <input type="text" name="name" id="name" class="form-control" required data-error="لطفا نام خود را وارد نمایید" placeholder="نام*">
                                                                    </div>
                                                                </div>

                                                                <div class="col-lg-6 col-sm-6">
                                                                    <div class="form-group">
                                                                        <input type="email" name="email_address" id="email_address" required data-error="Please enter email address" class="form-control" placeholder="آدرس ایمیل*">
                                                                    </div>
                                                                </div>

                                                                <div class="col-lg-12 col-md-12">
                                                                    <div class="form-group">
                                                                        <textarea name="message" class="form-control" id="message" cols="30" rows="8" required data-error="پیام خود را بنویسید" placeholder="پیام شما"></textarea>
                                                                    </div>
                                                                </div>

                                                                <div class="col-lg-12 col-md-12">
                                                                    <button type="submit" class="default-btn btn-bg-three">
                                                                        ارسال پیام
                                                                    </button>
                                                                </div>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="tabs_item">
                                    <div class="products-tabs-shipping">
                                        <ul>
                                            <li>
                                                آدرس:
                                                <span>3227 جاده میلبوک، انگلستان</span>
                                            </li>

                                            <li>
                                                شماره تماس:
                                                <a href="tel:+1(123)-456-7890-3524">+1 (123) 456 7890 3524</a>
                                            </li>

                                            <li>
                                                ایمیل:
                                                <a href="mailto:hello@olex.com">hello@olex.com</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Product Tab End -->

<!-- Related Product Area -->
<div class="related-products-area pt-100 pb-70">
    <div class="container">
        <div class="section-title">
            <h2>محصولات مرتبط</h2>
        </div>
        <div class="row pt-45">
            <div class="col-lg-3 col-sm-6">
                <div class="product-card">
                    <div class="product-card-img">
                        <a href="shop-details.html">
                            <img src="{{asset('client/images/products/product-img1.png')}}" alt="تصویر محصول">
                        </a>
                        <div class="product-card-tag">
                            <h3>فروش</h3>
                        </div>
                        <ul class="product-card-action">
                            <li>
                                <a href="cart.html"><i class='bx bx-cart'></i></a>
                            </li>
                            <li>
                                <a href="#"><i class='bx bx-heart'></i></a>
                            </li>
                            <li>
                                <a href="#" data-toggle="modal" data-target="#productsQuickView">
                                    <i class='bx bx-show-alt'></i>
                                </a>
                            </li>
                        </ul>
                    </div>

                    <div class="content">
                        <h3><a href="shop-details.html">هدفون سنهیزر</a></h3>
                        <span>12000 تومان</span>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-sm-6">
                <div class="product-card">
                    <div class="product-card-img">
                        <a href="shop-details.html">
                            <img src="{{asset('client/images/products/product-img2.png')}}" alt="تصویر محصول">
                        </a>
                        <div class="product-card-tag">
                            <h3>فروش</h3>
                        </div>
                        <ul class="product-card-action">
                            <li>
                                <a href="cart.html"><i class='bx bx-cart'></i></a>
                            </li>
                            <li>
                                <a href="#"><i class='bx bx-heart'></i></a>
                            </li>
                            <li>
                                <a href="#" data-toggle="modal" data-target="#productsQuickView">
                                    <i class='bx bx-show-alt'></i>
                                </a>
                            </li>
                        </ul>
                    </div>

                    <div class="content">
                        <h3><a href="shop-details.html">نیکون پی-1000</a></h3>
                        <span>99000 تومان</span>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-sm-6">
                <div class="product-card">
                    <div class="product-card-img">
                        <a href="shop-details.html">
                            <img src="{{asset('client/images/products/product-img3.png')}}" alt="تصویر محصول">
                        </a>
                        <div class="product-card-tag">
                            <h3>جدید</h3>
                        </div>
                        <ul class="product-card-action">
                            <li>
                                <a href="cart.html"><i class='bx bx-cart'></i></a>
                            </li>
                            <li>
                                <a href="#"><i class='bx bx-heart'></i></a>
                            </li>
                            <li>
                                <a href="#" data-toggle="modal" data-target="#productsQuickView">
                                    <i class='bx bx-show-alt'></i>
                                </a>
                            </li>
                        </ul>
                    </div>

                    <div class="content">
                        <h3><a href="shop-details.html">گوشی سنهیزر</a></h3>
                        <span>39000 تومان</span>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-sm-6">
                <div class="product-card">
                    <div class="product-card-img">
                        <a href="shop-details.html">
                            <img src="{{asset('client/images/products/product-img4.png')}}" alt="تصویر محصول">
                        </a>
                        <div class="product-card-tag">
                            <h3>جدید</h3>
                        </div>
                        <ul class="product-card-action">
                            <li>
                                <a href="cart.html"><i class='bx bx-cart'></i></a>
                            </li>
                            <li>
                                <a href="#"><i class='bx bx-heart'></i></a>
                            </li>
                            <li>
                                <a href="#" data-toggle="modal" data-target="#productsQuickView">
                                    <i class='bx bx-show-alt'></i>
                                </a>
                            </li>
                        </ul>
                    </div>

                    <div class="content">
                        <h3><a href="shop-details.html">ای واچ گالری</a></h3>
                        <span>13000 تومان</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Related Product Area End -->
@endsection