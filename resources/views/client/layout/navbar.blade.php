<!-- Start Navbar Area -->
<div class="navbar-area">
    <!-- Menu For Mobile Device -->
    <div class="mobile-nav">
        <a href="index-2.html" class="logo">
            <img src="{{asset('client/images/logos/logo-1.png')}}" alt="Logo">
        </a>
    </div>

    <!-- Menu For Desktop Device -->
    <div class="main-nav nav-three">
        <div class="container">
            <nav class="navbar navbar-expand-md navbar-light ">
                <a class="navbar-brand" href="index-2.html">
                    <img src="{{asset('client/images/logos/logo-3.png')}}" alt="Logo">
                </a>

                <div class="collapse navbar-collapse mean-menu" id="navbarSupportedContent">
                    <ul class="navbar-nav m-auto">
                        @auth
                            <li class="nav-item"><a  href="{{route('client.likes.index')}}">لیست علاقه مندی (<span  id="likes_count">{{auth()->user()->likes()->count()}}</span>)</a></li>
                        @endauth
                            <div class="col-table-cell col-lg-3 col-md-3 col-sm-6 col-xs-12">

                            </div>
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


                        <li class="nav-item">
                            <a href="contact.html" class="nav-link">
                                ارتباط با ما
                            </a>
                        </li>
                    </ul>


                                    <a href="{{route('cart.index')}}"><span class="total-items">{{\App\Models\Cart::totalItems()}}</span> آیتم -
                                        <span class="total-amount">{{\App\Models\Cart::totalAmount()}}</span>
                        تومان</a>
                    </div>
                 </nav>
           </div>
        </div>
    </div>

<!-- End Navbar Area -->
