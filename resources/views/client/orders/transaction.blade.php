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
                        <img src="{{asset('client/images/checkout-img.png')}}" alt="Inner Banner">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Inner Banner Area End -->

    <div class="row">
        <div class="col-sm-12">
            <div class="box">

                <div class="box-body">
                    <div class="row">
                        <div class="col-sm-8">
                            <div class="box">
                                <div class="box-header with-border">
                                    <h1 class="box-title m-5">
                                        فاکتور پرداخت
                                    </h1>
                                </div>
                                <div CLASS="m-5">
                                    <div >
                                        <table id="example5" class="table table-bordered table-striped" style="width:100%">
                                            <thead>
                                            <tr>
                                                <th>ردیف</th>
                                                <th>نام محصول</th>
                                                <th>قیمت تک محصول</th>
                                                <th>تعداد</th>
                                                <th>قیمت کل</th>
                                            </tr>
                                            </thead>

                                            @foreach($order->details as $orderDetail)
                                                @php
                                                $product=\App\Models\Product::query()->where('id',$orderDetail->product_id)->firstOrFail();
                                                @endphp
                                                <tr>
                                                    <td>{{ $loop->iteration}}</td>
                                                    <td>{{$product->name}}</td>
                                                    <td>{{number_format($orderDetail->unit_amount)}}</td>
                                                    <td>{{$orderDetail->count}}</td>
                                                    <td>{{number_format($orderDetail->total_amount)}}</td>
                                                </tr>
                                            @endforeach
                                        </table>
                                        <h1 class="m-5" >مبلغ کل فاکتور : {{number_format($order->amount)}}</h1>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div >

                    </div>
                </div>
                <div class="form-control-file">
                    <form action="{{route('client.transaction', $order)}}" method="post">
                        @csrf
                        <div class="row">
                            <div class="col-lg-12">
                               <!-- <div class="form-group">
                                    <label>در صورت داشتن کد تخفیف ان را وارد نمایید</label>
                                    <input type="text" class="form-control" name="code" id="code" placeholder="کد تخفیف">
                                </div>!-->
                        <input type="hidden" name="payment_status" value="ok">
                        <div class="col-lg-12 col-md-12 p-20">
                            <input type="submit" name="submit" value="پرداخت" class="btn btn-success m-5">
                            <a href="{{route('client.orders.index')}}" type="submit"  class="btn btn-danger">انصراف </a>
                        </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection