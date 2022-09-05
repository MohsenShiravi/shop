@extends('client.layout.master')
@section('content')

    @include('client.layout.navbar')

    <!-- Inner Banner Area -->
        <div class="inner-banner-area">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-6">
                        <div class="inner-banner-content">
                            <h2>ثبت‌نام</h2>
                            <ul>
                                <li><a href="index-2.html">خانه</a></li>
                                <li><i class='bx bx-chevron-left'></i></li>
                                <li><a href="register.html" class="active">ثبت‌نام</a></li>
                            </ul>
                        </div>
                    </div>

                    <div class="col-lg-6">
                        <div class="inner-banner-img">
                            <img src="{{asset('client/images/inner-banner/inner-banner1.png')}}" alt="Inner Banner">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Inner Banner Area End -->

        <!-- User Area -->
        <div class="user-area pt-100 pb-70">
            <div class="container">
                <div class="user-width">
                    <div class="row align-items-center">
                        <div class="col-lg-6">
                            <div class="user-content">
                                <h2>سلام</h2>
                                <p>در هر زمان به راحتی می توانید در حساب خود ثبت نام کنید.</p>
                                <a href="log-in.html" class="user-btn">وارد شوید</a>
                            </div>
                        </div>

                        <div class="col-lg-6">
                            <div class="user-form">
                                <h2>ثبت نام کنید</h2>
                                <form action="{{route('register.store')}}" method="post">
                                   @csrf
                                    <div class="row">
                                        <div class="col-lg-12 ">
                                            <div class="form-group">
                                                <i class='bx bx-user'></i>
                                                <input type="text" class="form-control" name="name" required data-error="نام کاربری خود را وارد نمایید" placeholder="نام کاربری خود را وارد نمایید">
                                            </div>
                                        </div>

                                        <div class="col-lg-12 ">
                                            <div class="form-group">
                                                <i class='bx bx-envelope'></i>
                                                <input type="email" class="form-control" name="email" required data-error="لطفا نام کاربری یا ایمیل خود را وارد نمایید" placeholder="ایمیل خود را وارد نمایید">
                                            </div>
                                        </div>

                                        <div class="col-12">
                                            <div class="form-group">
                                                <i class='bx bx-lock'></i>
                                                <input class="form-control" type="password" name="password" placeholder="رمزعبور">
                                            </div>
                                        </div>

                                        <div class="col-lg-12 ">
                                            <button type="submit" class="default-btn btn-bg-three">
                                                ثبت نام
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
        <!-- User Area End -->

@endsection
