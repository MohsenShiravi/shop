@extends('client.layout.master')
@section('content')
    @include('client.layout.navbar')
    <!-- Inner Banner Area -->
    <div class="inner-banner-area">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <div class="inner-banner-content">
                        <h2>وضعیت سفارشات شما</h2>
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
                        سفارشات در انتظار پرداخت
                    </h1>
                </div>
                <div >
                    <div >
                        <table id="example5" class="table table-bordered table-striped" style="width:100%">
                            <thead>
                            <tr>
                                <th>ردیف</th>
                                <th>نام</th>
                                <th>ادرس تحویل</th>
                                <th>موبایل</th>
                                <th>مبلغ کل سفارش</th>
                                <th>کد رهگیری</th>
                                <th>ورود به درگاه بانکی</th>

                            </tr>
                            </thead>

                            @foreach($orders as $order)

                                    <tr><td>{{ $loop->iteration}}</td>
                                        <td>{{$order->user->name}}</td>
                                        <td>{{$order->address}}</td>
                                        <td>{{$order->mobile}}</td>
                                        <td>{{number_format($order->amount)}}</td>
                                        <td>@if(isset($order->transaction_id))<span style= "color: white;background-color: #0d6632; padding: 5px;border-radius: 5px">{{$order->transaction_id}}</span>@else<span style="color: white;background-color: red; padding: 5px;border-radius: 5px">پرداخت نشده </span> @endif</td>
                                        <td>
                                            @if(is_null($order->transaction_id))
                                            <a href="{{route('client.edit', $order)}}" class="btn btn-sm btn-primary">پرداخت سفارش</a>@else پرداخت با موفقیت انجام شد
                                            @endif
                                        </td></tr>
                            @endforeach

                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>


    @endsection