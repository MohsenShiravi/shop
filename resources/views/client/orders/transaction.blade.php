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

                <div class="box-body">
                    <div class="row">
                        <div class="col-sm-8">
                            <div class="box">
                                <div class="box-header with-border">
                                    <h1 class="box-title">
                                        فاکتور پرداخت
                                    </h1>
                                </div>
                                <div >
                                    <div >
                                        <table id="example5" class="table table-bordered table-striped" style="width:100%">
                                            <thead>
                                            <tr>
                                                <th>ردیف</th>
                                                <th>کد محصول</th>
                                                <th>قیمت تک محصول</th>
                                                <th>تعداد</th>
                                                <th>قیمت کل</th>
                                            </tr>
                                            </thead>

                                            @foreach($order->details as $orderDetail)
                                                <tr>
                                                    <td>{{ $loop->iteration}}</td>
                                                    <td>{{$orderDetail->product_id}}</td>
                                                    <td>{{number_format($orderDetail->unit_amount)}}</td>
                                                    <td>{{$orderDetail->count}}</td>
                                                    <td>{{number_format($orderDetail->total_amount)}}</td>
                                                </tr>
                                            @endforeach
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                        <h1>مبلغ کل فاکتور : {{number_format($order->amount)}}</h1>
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
                            <input type="submit" name="submit" value="پرداخت" class="default-btn btn-bg-three">
                        </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection