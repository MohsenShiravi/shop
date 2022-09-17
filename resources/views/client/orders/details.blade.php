@extends('client.layout.master')
@section('content')
    @include('client.layout.navbar')
<!-- Inner Banner Area -->
        <div class="inner-banner-area">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-6">
                        <div class="inner-banner-content">
                            <h2>جزئیات سفارش من</h2>
                            <ul>
                                <li><a href="{{route('index')}}">خانه</a></li>
                            </ul>
                        </div>
                    </div>

                    <div class="col-lg-6">
                        <div class="inner-banner-img">
                            <img src="{{asset('client/images/inner-banner/inner-banner5.png')}}" alt="Inner Banner">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Inner Banner Area End -->

        <!-- اکانت من Area -->
        <div class="my-account-area ptb-100">
            <div class="container">
                <div class="tab account-tab">
                    <div class="row">
                        <div class="col-lg-4">
                            <ul class="tabs">
                                <li>
                                    <a href="#">
    جزئیات فاکتور
</a>
                                </li>
                                <li>
                                    <a href="#">
                                        اکانت من
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
    آدرس تحویل سفارش
                                    </a>
                                </li>
                            </ul>
                        </div>

                        <div class="col-lg-8">
                            <div class="tab_content current active">
                                <div class="tabs_item">
                                    <div class="account-tab-item">
                                        <div class="checkout-order">
                                            <h2>فاکتور شماره {{$order->id}}</h2>
                                            @foreach($order->details as $orderDetail)
                                                @php
                                                    $product=\App\Models\Product::query()->where('id',$orderDetail->product_id)->firstOrFail();
                                                @endphp
                                                <ul class="checkout-product">
                                                    <li>
                                                        <img src="{{Storage::url($product->file->path.'/'.$product->file->name)}}" alt="{{$product->name}}" title="{{$product->name}}">
                                                        <h3>{{$product->name}}</h3>
                                                        <span>{{number_format($orderDetail->unit_amount)}}</span><br>
                                                        <span>تعداد : {{$orderDetail->count}}</span>
                                                        <div class="price-tag">{{number_format($orderDetail->total_amount)}}</div>
                                                    </li>
                                                </ul>
                                            @endforeach
                                            <div class="total-amount">
                                                <h2 class="amount-title">زیرمبلغ کل  <span>{{number_format($order->amount)}}</span></h2>
                                                <h3 class="vat-title">مبلغ قابل پرداخت <span>{{number_format($order->amount)}}</span></h3>
                                                <h3 class="vat-title">وضعیت پرداخت @if(isset($order->transaction_id))<span style= "color: white;background-color: #0d6632; padding: 5px;border-radius: 5px">پرداخت شده--کد تراکنش :{{$order->transaction_id}}</span>@else<span style="color: white;background-color: red; padding: 5px;border-radius: 5px">پرداخت نشده </span> @endif</h3>

                                            </div>

                                            <div class="amount-btn">
                                                <a href="{{route('client.orders.index')}}" class="default-btn btn-bg-three">بازگشت به فاکتورها</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tabs_item current">
                                    <div class="account-tab-item">
                                        <div class="account-details">
                                            <h2>جزییات پروفایل</h2>
                                            <h2>نام</h2>
                                            <p>{{auth()->user()->name}}</p>
                                            <hr>
                                            <h2>ایمیل</h2>
                                            <p>{{auth()->user()->email}}</p>
                                            <hr>
                                            <h2>موبایل</h2>
                                            <p>{{$order->mobile}}</p>
                                        </div>
                                    </div>
                                </div>



                                <div class="tabs_item">
                                    <div class="account-tab-item">
                                        <div class="address-details">
                                            <h2>آدرس من </h2>
                                            <span>{{$order->address}}</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- اکانت من Area End -->
@endsection