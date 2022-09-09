@extends('client.layout.master')
@section('content')
    @include('client.layout.navbar')
    <!-- Inner Banner Area -->
    <div class="inner-banner-area">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <div class="inner-banner-content">
                        <h2>                        صفحه پرداخت بانک
                        </h2>
                        <ul>
                            <li><a href="{{route('index')}}">خانه</a></li>
                            <li><i class='bx bx-chevron-left'></i></li>
                            <li><a href="{{route('client.orders.create')}}" class="active">تکمیل سفارش </a></li>
                        </ul>
                    </div>
                </div>

                <div class="col-lg-6">
                    <div class="inner-banner-img">
                        <img src="{{asset('client/images/inner-banner/inner-banner10.png')}}" alt="Inner Banner">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Inner Banner Area End -->

    <div class="row">
        <div class="col-sm-12">
            <div class="box">
                <div class="box-header with-border">
                    <h1 class="box-title">
                        صفحه پرداخت بانک
                    </h1>
                </div>
                <div class="box-body">
                    <h1>مبلغ کل فاکتور : {{number_format($order->amount)}}</h1>
                </div>
                <div class="form-control-file">
                    <form action="{{route('client.transaction', $order)}}" method="post">
                        @csrf
                        <input type="hidden" name="payment_status" value="ok">
                        <div class="col-lg-12 col-md-12 p-20">
                            <input type="submit" name="submit" value="پرداخت" class="default-btn btn-bg-three">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection