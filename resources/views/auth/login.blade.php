@extends('client.layout.master')
@section('content')

di    @include('client.layout.navbar')
<div class="inner-banner-area">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6">
                <div class="inner-banner-content">
                    <h2>ورود</h2>
                    <ul>
                        <li><a href="{{route('index')}}">صفحه اصلی فروشگاه</a></li>
                        <li><i class='bx bx-chevron-left'></i></li>
                        <li><a href="log-in.html" class="active">ورود</a></li>
                    </ul>
                </div>
            </div>

            <div class="col-lg-6">
                <div class="inner-banner-img">
                    <img src="{{asset('client/images/inner-banner/inner-banner2.png')}}" alt="Inner Banner">
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
                        <p>در صورتیکه ثبت نام نکرده اید روی ثبت نام کلیک کنید</p>
                        <a href="{{route('register')}}" class="user-btn">ثبت نام</a>
                    </div>
                </div>

                <div class="col-lg-6">
                    <div class="user-form">
                        <h2>ورود</h2>
                        <form action="{{route('login.store')}}" method="post">
                            @csrf
                            <div class="row">
                                <div class="col-lg-12 ">
                                    <div class="form-group">
                                        <i class='bx bx-user'></i>
                                        <input type="email" name="email" class="form-control" required data-error="لطفا ایمیل خود را وارد نمایید" placeholder="ایمیل">
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
                                        ورود
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