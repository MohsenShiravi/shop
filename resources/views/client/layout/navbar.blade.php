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
                            <a href="#" class="nav-link">
                                بلاگ
                                <i class='bx bx-chevron-down'></i>
                            </a>
                            <ul class="dropdown-menu">
                                <li class="nav-item">
                                    <a href="blog-1.html" class="nav-link">
                                        بلاگ استایل یک
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="blog-2.html" class="nav-link">
                                        بلاگ استایل دو
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="blog-details.html" class="nav-link">
                                        بلاگ جزییات
                                    </a>
                                </li>
                            </ul>
                        </li>

                        <li class="nav-item">
                            <a href="contact.html" class="nav-link">
                                ارتباط با ما
                            </a>
                        </li>
                    </ul>

                    <div class="nav-other">
                        <div class="nav-other-item">
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
                        <div class="nav-other-item">
                            <div class="cart-btn-area">
                                <a href="#" class="cart-btn"><i class='bx bx-cart'></i></a>
                                <span>1</span>
                            </div>
                        </div>
                    </div>

                    <div class="nav-btn nav-other-btn">
                        <a href="log-in.html" class="default-btn btn-bg-three">وارد شوید</a>
                    </div>
                </div>
            </nav>
        </div>
    </div>

    <div class="side-nav-responsive">
        <div class="container">
            <div class="dot-menu">
                <div class="circle-inner">
                    <div class="circle circle-one"></div>
                    <div class="circle circle-two"></div>
                    <div class="circle circle-three"></div>
                </div>
            </div>

            <div class="container">
                <div class="side-nav-inner">
                    <div class="side-nav justify-content-center align-items-center">
                        <div class="side-item">
                            <div class="nav-other-item">
                                <div class="language-list">
                                    <div class="dropdown language-list-dropdown">
                                        <button class="btn dropdown-toggle" type="button" id="dropdownMenuButton-two" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            زبان
                                            <i class='bx bx-chevron-down'></i>
                                        </button>
                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton-two">
                                            <a class="dropdown-item" href="#">
                                                <img src="{{asset('client/images/language-flag/eng.png')}}" alt="Images">
                                                انگلیسی
                                            </a>
                                            <a href="#">
                                                <img src="{{asset('client/images/language-flag/arabic.png')}}" alt="Images">
                                                عربی
                                            </a>
                                            <a href="#">
                                                <img src="{{asset('client/images/language-flag/germany.png')}}" alt="Images">
                                                آلمانی
                                            </a>
                                            <a href="#">
                                                <img src="{{asset('client/images/language-flag/portugal.png')}}" alt="Images">
                                                پرتقالی
                                            </a>
                                            <a href="#">
                                                <img src="{{asset('client/images/language-flag/china.png')}}" alt="Images">
                                                چینی
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="nav-other-item">
                                <div class="cart-btn-area">
                                    <a href="#" class="cart-btn"><i class='bx bx-cart'></i></a>
                                    <span>1</span>
                                </div>
                            </div>

                            <div class="nav-other-item">
                                <div class="option-btn">
                                    <a href="log-in.html" class="default-btn">وارد شوید</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Navbar Area -->
