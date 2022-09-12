<!-- Start Navbar Area -->
<div class="navbar-area">
    <!-- Menu For Mobile Device -->
    <div class="mobile-nav">
        <a href="{{route('index')}}" class="logo">
            <img src="{{asset('client/images/logos/logo-1.png')}}" alt="Logo">
        </a>
    </div>

    <!-- Menu For Desktop Device -->
    <div class="main-nav nav-three">
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
                            <li class="nav-item"><a  href="{{route('client.likes.index')}}">علاقه مندی ها (<span  id="likes_count">{{auth()->user()->likes()->count()}}</span>)</a></li>
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
                                                <td class="text-right"><span class="total-amount">{{number_format(\App\Models\Cart::totalAmount())}}</span> تومان</td>
                                            </tr>

                                            <tr>
                                                <td class="text-right"><strong>قابل پرداخت</strong></td>
                                                <td class="text-right"><span class="total-amount">{{number_format(\App\Models\Cart::totalAmount())}}</span> تومان</td>
                                            </tr>
                                            </tbody>
                                        </table>
                                        <p class="checkout"><a href="{{route('cart.index')}}" class="btn btn-primary"><i class="fa fa-shopping-cart"></i> مشاهده سبد</a>&nbsp;&nbsp;&nbsp;<a href="{{route('client.orders.create')}}" class="btn btn-primary"><i class="fa fa-share"></i> ثبت سفارش</a></p>
                                    </div>
                                </li>
                            </ul>
                        </li>
                    </ul>
                    <a href="{{route('cart.index')}}"><span class="total-items">{{\App\Models\Cart::totalItems()}}</span> آیتم -
                                        <span class="total-amount">{{number_format(\App\Models\Cart::totalAmount())}}</span>
                        تومان</a>
                    </div>
                @if(!auth()->user())
                    <div class="nav-btn">
                        <a href="{{route('login')}}" class="default-btn border-radius-5 btn-bg-one">ورود</a>
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

<!-- End Navbar Area -->
