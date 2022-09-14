<!doctype html>
<html lang="zxx">

<head>
    <!-- Required Meta Tags -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{asset('client/css/bootstrap.rtl.min.css')}}">
    <!-- Animate Min CSS -->
    <link rel="stylesheet" href="{{asset('client/css/animate.min.css')}}">
    <!-- Flaticon CSS -->
    <link rel="stylesheet" href="{{asset('client/fonts/flaticon.css')}}">
    <!-- Boxicons CSS -->
    <link rel="stylesheet" href="{{asset('client/css/boxicons.min.css')}}">
    <!-- Magnific Popup CSS -->
    <link rel="stylesheet" href="{{asset('client/css/magnific-popup.css')}}">
    <!-- Owl Carousel Min CSS -->
    <link rel="stylesheet" href="{{asset('client/css/owl.carousel.min.css')}}">
    <link rel="stylesheet" href="{{asset('client/css/owl.theme.default.min.css')}}">
    <!-- Nice Select Min CSS -->
    <link rel="stylesheet" href="{{asset('client/css/nice-select.min.css')}}">
    <!-- Meanmenu CSS -->
    <link rel="stylesheet" href="{{asset('client/css/meanmenu.css')}}">
    <!-- Style CSS -->
    <link rel="stylesheet" href="{{asset('client/css/style.css')}}">
    <!-- Responsive CSS -->
    <link rel="stylesheet" href="{{asset('client/css/responsive.css')}}">
    <!-- RTL CSS -->
    <link rel="stylesheet" href="{{asset('client/css/rtl.css')}}">

    <!-- Favicon -->
    <link rel="icon" type="image/png" href="{{asset('client/images/favicon.png')}}')}}">

    <title> پروژه فروشگاه انلاین | محسن شیروی </title>
</head>

<body class="body-color">
<div class="preloader">
    <div class="spinner">
        <div class="dot1"></div>
        <div class="dot2"></div>
    </div>
</div>

@yield('content')
<!-- Footer Area -->
<footer class="footer-area footer-bg">
    <div class="container">
        <div class="footer-contact">
            <div class="newsletter-area">
                <h2>به اشتراک خبرنامه ما اضافه شوید</h2>
                <form class="newsletter-form" data-toggle="validator" method="POST">
                    <input type="email" class="form-control" placeholder="ایمیل خود را وارد کنید" name="EMAIL" required autocomplete="off">
                    <button class="subscribe-btn" type="submit">
                        اشتراک
                    </button>
                    <div id="validator-newsletter" class="form-result"></div>
                </form>
            </div>

            <div class="newsletter-shape">
                <div class="shape1">
                    <img src="{{asset('client/images/shape/shape1.png')}}" alt="Images">
                </div>
                <div class="shape2">
                    <img src="{{asset('client/images/shape/shape2.png')}}" alt="Images">
                </div>
                <div class="shape3">
                    <img src="{{asset('client/images/shape/shape3.png')}}" alt="Images">
                </div>
                <div class="shape4">
                    <img src="{{asset('client/images/shape/shape4.png')}}" alt="Images">
                </div>
                <div class="shape5">
                    <img src="{{asset('client/images/shape/shape3.png')}}" alt="Images">
                </div>
                <div class="shape6">
                    <img src="{{asset('client/images/shape/shape2.png')}}" alt="Images">
                </div>
            </div>
        </div>

        <div class="footer-top pb-70">
            <div class="row">
                <div class="col-lg-4 col-md-6">
                    <div class="footer-widget">
                        <div class="footer-logo">
                            <a href="index-2.html">
                                <img src="{{asset('client/images/logos/logo-1.png')}}" alt="Images">
                            </a>
                        </div>
                        <p>
                            ما یکی از بهترین شرکت ها در جهان هستیم و شما می توانید به راحتی از ما خرید کنید.
                        </p>
                        <ul class="footer-list-contact">
                            <li>
                                <i class='flaticon-placeholder'></i>
                                <a href="#">2873  یورک شایر سیرکل ، کارولینا</a>
                            </li>
                            <li>
                                <i class='flaticon-smartphone'></i>
                                <a href="tel:+501-529-1747">+501-529-1747</a>
                            </li>
                            <li>
                                <i class='flaticon-messenger'></i>
                                <a href="mailto:hello@olex.com">hello@olex.com</a>
                            </li>
                        </ul>

                        <ul class="social-link">
                            <li>
                                <a href="#" target="_blank"><i class='bx bxl-facebook'></i></a>
                            </li>
                            <li>
                                <a href="#" target="_blank"><i class='bx bxl-twitter'></i></a>
                            </li>
                            <li>
                                <a href="#" target="_blank"><i class='bx bxl-instagram'></i></a>
                            </li>
                            <li>
                                <a href="#" target="_blank"><i class='bx bxl-pinterest-alt'></i></a>
                            </li>
                            <li>
                                <a href="#" target="_blank"><i class='bx bxl-youtube'></i></a>
                            </li>
                        </ul>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6">
                    <div class="footer-widget">
                        <h3>خدمات</h3>
                        <ul class="footer-list">
                            <li>
                                <a href="wordpress-hosting.html" target="_blank">
                                    اکانت من
                                </a>
                            </li>
                            <li>
                                <a href="tracking-order.html" target="_blank">
                                    پیگیری سفارش
                                </a>
                            </li>
                            <li>
                                <a href="customer-services.html" target="_blank">
                                    خدمات مشتریان
                                </a>
                            </li>
                            <li>
                                <a href="compare.html" target="_blank">
                                    مقایسه
                                </a>
                            </li>
                            <li>
                                <a href="wishlist.html" target="_blank">
                                    علاقه‌مندی‌ها
                                </a>
                            </li>
                            <li>
                                <a href="privacy-policy.html" target="_blank">
                                    سیاست حفظ حریم شخصی
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>

                <div class="col-lg-2 col-md-6">
                    <div class="footer-widget">
                        <h3>لینک‌های مفید</h3>
                        <ul class="footer-list">
                            <li>
                                <a href="index-2.html" target="_blank">
                                    خانه
                                </a>
                            </li>
                            <li>
                                <a href="about.html" target="_blank">
                                    درباره ما
                                </a>
                            </li>
                            <li>
                                <a href="blog-details.html" target="_blank">
                                    بلاگ جزییات
                                </a>
                            </li>
                            <li>
                                <a href="shop-details.html" target="_blank">
                                    جزییات محصول
                                </a>
                            </li>
                            <li>
                                <a href="testimonials.html" target="_blank">
                                    رضایت مشتریان
                                </a>
                            </li>
                            <li>
                                <a href="team.html" target="_blank">
                                    تیم
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6">
                    <div class="footer-widget">
                        <h3>ساعت کاری</h3>
                        <p>
                            لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است.
                        </p>
                        <ul class="footer-work-hour-list">
                            <li>
                                <span>شنبه-پنجشنبه:</span> 8:30 قبل‌ازظهر - 5:30 بعدازظهر
                            </li>
                            <li>
                                <span> جمعه:</span> 9:00 قبل‌ازظهر - 2:00 بعدازظهر
                            </li>
                            <li>
                                <span>دوشنبه:</span>  بسته
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <div class="copy-right-area">
            <div class="copy-right-text">
                <p>
                    کپی رایت @ 1399 اولکس. کلیه حقوق محفوظ است . ارایه از
                    <a href=" " target="_blank">AFARIDTEAM</a>
                </p>
            </div>
        </div>
    </div>
</footer>
<!-- Footer Area End -->

<!-- QuickView Modal Area -->
<div class="modal fade productsQuickView" id="productsQuickView" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true"><i class='bx bx-x'></i></span>
            </button>

            <div class="row">
                <div class="col-lg-5 col-md-4">
                    <div class="products-image"><img src="{{asset('client/images/products/shop-details-img1.png')}}" alt="Images"></div>
                </div>

                <div class="col-lg-7 col-md-8">
                    <div class="product-content">
                        <h3>خرس بزرگ تدی بر</h3>
                        <div class="product-text">
                            <p>لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است. </p>
                        </div>
                        <div class="price-status">
                            <div class="price">
                                <span class="new-price">54100 تومان</span>
                                <div class="rating">
                                    <i class='bx bxs-star'></i>
                                    <i class='bx bxs-star'></i>
                                    <i class='bx bxs-star'></i>
                                    <i class='bx bxs-star'></i>
                                    <i class='bx bxs-star'></i>
                                </div>
                            </div>

                            <div class="availability-status">
                                <ul>
                                    <li>موجودی: <span>موجود در انبار</span></li>
                                    <li>تاریخ انقضا: <span>12 آذر, 1399</span></li>
                                </ul>
                            </div>
                        </div>
                        <div class="product-add-to-cart">
                            <div class="input-counter">
                                        <span class="minus-btn">
                                            <i class='bx bx-minus'></i>
                                        </span>
                                <input type="text" value="1">
                                <span class="plus-btn">
                                            <i class='bx bx-plus'></i>
                                        </span>
                            </div>
                            <button type="submit" class="default-btn btn-bg-three">
                                افزودن به سبد خرید
                            </button>

                            <button type="submit" class="default-btn btn-bg-three">
                                همین حالا بخرید
                            </button>
                        </div>

                        <div class="advantage-list">
                            <h3>جرییات فنی این محصول:</h3>
                            <ul>
                                <li>بسیار تازه و با کیفیت کامل</li>
                                <li>این را از منبع طبیعی جمع آوری کنید</li>
                                <li>دامنه اعتبار مناسبی داشته باشید</li>
                                <li>تحویل رایگان خانه</li>
                            </ul>
                        </div>

                        <div class="products-share">
                            <ul class="social">
                                <li><span>اشتراک:</span></li>
                                <li>
                                    <a href="#" class="facebook" target="_blank"><i class='bx bxl-facebook'></i></a>
                                </li>
                                <li>
                                    <a href="#" class="twitter" target="_blank"><i class='bx bxl-twitter'></i></a>
                                </li>
                                <li>
                                    <a href="#" class="linkedin" target="_blank"><i class='bx bxl-linkedin'></i></a>
                                </li>
                                <li>
                                    <a href="#" class="instagram" target="_blank"><i class='bx bxl-instagram'></i></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- QuickView Modal Area End -->

<style>
    .like {
        color: red;
    }
</style>
<!-- Jquery Min JS -->
<script src="{{asset('client/js/jquery-3.5.1.slim.min.js')}}"></script>
<!-- Popper Min JS -->
<!-- <script src="{{asset('client/js/popper.min.js')}}"></script> -->
<!-- Bootstrap Min JS -->
<!--<script src="{{asset('client/js/bootstrap.min.js')}}"></script>-->
<script src="{{asset('client/js/bootstrap.bundle.js')}}"></script>
<!-- Magnific Popup Min JS -->
<script src="{{asset('client/js/jquery.magnific-popup.min.js')}}"></script>
<!-- Owl Carousel Min JS -->
<script src="{{asset('client/js/owl.carousel.min.js')}}"></script>
<!-- Nice Select Min JS -->
<script src="{{asset('client/js/jquery.nice-select.min.js')}}"></script>
<!-- Wow Min JS -->
<script src="{{asset('client/js/wow.min.js')}}"></script>
<!-- Meanmenu JS -->
<script src="{{asset('client/js/meanmenu.js')}}"></script>
<!-- Ajaxchimp Min JS -->
<script src="{{asset('client/js/jquery.ajaxchimp.min.js')}}"></script>
<!-- Form Validator Min JS -->
<script src="{{asset('client/js/form-validator.min.js')}}"></script>
<!-- Contact Form JS -->
<script src="{{asset('client/js/contact-form-script.js')}}"></script>
<!-- Mixitup Min JS -->
<script src="{{asset('client/js/mixitup.min.js')}}"></script>
<!-- Custom JS -->
<script src="{{asset('client/js/custom.js')}}"></script>
<script>
    function like(productId){

        $.ajax({
            type: 'post',
            url: '/likes/' + productId,
            data: {
                _token: "{{csrf_token()}}"
            },
            success: function (data){
                var icon = $('#like-'+productId + '>.bx-heart');

                if (icon.hasClass('like')){
                    icon.removeClass('like');
                }else {
                    icon.addClass('like');
                }

                $('#likes_count').text(data.likes_count)

            }
        })

    }

    function addToCart(productId)
    {
        var quantity = 1;

        if($('#input-quantity').length){
            quantity = $('#input-quantity').val();
        }

        $.ajax({
            type: "post",
            url: "/cart/" + productId,
            data: {
                _token: "{{csrf_token()}}",
                quantity: quantity
            },
            success: function (data){
                $('.total-items').text(data.cart.total_items);
                $('.total-amount').text(data.cart.total_amount);

                if (!$('#cart-row-' + productId).length){

                    var product = data.cart[productId]['product'];
                    var productQty = data.cart[productId]['quantity'];

                    $('#cart-table-body:last-child').append(
                        '<tr id="cart-row-' + product.id +'">'
                        + '<td class="text-center"><a href="product.html"><img width="100"  class="img-thumbnail" title="'+ product.name +'" alt="' + product.name + '" src="' + product.image_path +'"></a></td>'

                        + '<td class="text-left"><a href="product.html">' + product.name +'</a></td>'
                        + '<td class="text-right">x' + productQty +'</td>'
                        + '<td class="text-right">' + product.cost_with_discount + ' تومان</td>'
                        + '<td class="text-center"><button class="btn btn-danger btn-xs remove" title="حذف" onClick="removeFromCart(' + product.id + ')" type="button"><i class="fa fa-times"></i></button></td>'
                        + '</tr>'
                    );

                }


            }
        })

    }

    function updateCart(productId)
    {
        var quantity = 1;

        if($('#input-quantity-' + productId).length){
            quantity = $('#input-quantity-'  + productId).val();
        }

        $.ajax({
            type: "post",
            url: "/cart/" + productId,
            data: {
                _token: "{{csrf_token()}}",
                quantity: quantity
            },
            success: function (data){
                var product = data.cart[productId]['product'];
                var productQty = data.cart[productId]['quantity'];
                console.log(productQty);
                $('.total-items').text(data.cart.total_items);
                $('.total-amount').text(data.cart.total_amount);
                $('#total-amount-'+productId).text(product.cost_with_discount * productQty);
            }
        })

    }

    function removeFromCart(productId)
    {
        $.ajax({
            type: "delete",
            url: "/cart/" + productId,
            data: {
                _token: "{{csrf_token()}}",
            },
            success: function (data){
                $('.total-items').text(data.cart.total_items);
                $('.total-amount').text(data.cart.total_amount);
                $('.cart-row-' + productId).remove();
            }
        })

    }
</script>
</body>
</html>
