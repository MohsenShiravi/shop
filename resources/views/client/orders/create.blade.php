@extends('client.layout.master')
@section('content')
    @include('client.layout.navbar')
    <!-- Inner Banner Area -->
    <div class="inner-banner-area">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <div class="inner-banner-content">
                        <h2>تکمیل سفارش </h2>
                        <ul>
                            <li><a href="{{route('index')}}">خانه</a></li>
                            <li><i class='bx bx-chevron-left'></i></li>
                            <li><a href="{{route('client.orders.create')}}" class="active">تکمیل سفارش </a></li>
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

    <!-- Checkout Area -->
    <div class="checkout-area pt-100 pb-70">
        <div class="container">
            <div class="section-title text-center">
                <h2 style="color: #6f42c1">بیایید تمام محصولات انتخاب شده توسط شما را بررسی کنیم</h2><br>
                <h3>نکته : در این مرحله هم میتوانید محصولات را <span style="color: red">ویرایش یا حذف</span>   نمایید.</h3>
            </div>
            <div class="tab checkout-tab">

                <div class="tab_content current active pt-45">
                    <div class="tabs_item current">
                        <div class="checkout-tab-item">
                            <div class="row align-items-center">

                                @include('admin.layout.errors')

                                <div class="col-lg-12 px-2">
                                    <div class="checkout-form">
                                        <div class="contact-form">
                                            <form action="{{route('client.orders.store')}}" method="post">
                                                @csrf
                                                <section class="cart-wraps-area ptb-100">
                                                    <div class="container">
                                                        <div class="row">
                                                            <div class="col-lg-12 col-md-12">
                                                                <div class="cart-wraps">
                                                                    <div class="cart-table table-responsive">
                                                                        <table class="table table-bordered">
                                                                            <thead>
                                                                            <tr>
                                                                                <th scope="col">محصول</th>
                                                                                <th scope="col">نام</th>
                                                                                <th scope="col">قیمت واحد</th>
                                                                                <th scope="col">تعداد</th>
                                                                                <th scope="col">کل</th>
                                                                                <th scope="col">حذف</th>
                                                                            </tr>
                                                                            </thead>

                                                                            <tbody>
                                                                            @foreach($items as $item)
                                                                                @php
                                                                                    $product = $item['product'];
                                                                                    $productQty = $item['quantity'];
                                                                                @endphp
                                                                                <tr class="cart-row-{{$product->id}}">
                                                                                    <td class="product-thumbnail">
                                                                                        <a href="{{route('showProduct',$product)}}">
                                                                                            <img src="{{$product->image_path}}" alt="{{$product->name}}" title="{{$product->name}}">
                                                                                        </a>
                                                                                    </td>

                                                                                    <td class="product-name">
                                                                                        <a href="{{route('showProduct',$product)}}">{{$product->name}}</a>
                                                                                    </td>

                                                                                    <td class="product-price">
                                                                                        <span class="unit-amount">{{number_format($product->cost_with_discount)}} تومان</span>
                                                                                    </td>

                                                                                    <td class="product-quantity">
                                                                                        <div class="input-counter">
														                                 <span class="minus-btn">
															                             <i class='bx bx-minus'></i>
														                                 </span>
                                                                                            <input id="input-quantity-{{$product->id}}" name="quantity" type="text" value="1">
                                                                                            <span class="plus-btn">
															                                <i class='bx bx-plus'></i>
													                                      	</span>
                                                                                            <a type="submit" data-toggle="tooltip" title="بروزرسانی" onclick="updateCart({{$product->id}})" ><i style="color:green " class="bx bx-refresh"></i></a>

                                                                                        </div>
                                                                                    </td>
                                                                                    <td ><span id="total-amount-{{$product->id}}" >{{$product->cost_with_discount * $productQty}}</span> تومان</td>

                                                                                    <td class="product-subtotal">

                                                                                        <a  class="remove">
                                                                                            <button type="button" data-toggle="tooltip" title="حذف" class="btn btn-danger" onClick="removeFromCart({{$product->id}})"><i class='bx bx-x-circle'></i></button>
                                                                                        </a>
                                                                                    </td>
                                                                                </tr>
                                                                            @endforeach
                                                                            </tbody>
                                                                        </table>
                                                                    </div>
                                                                    <div class="col-sm-4 col-sm-offset-8">
                                                                        <table class="table table-bordered">
                                                                            <tr>
                                                                                <td class="text-right"><strong>جمع کل:</strong></td>
                                                                                <td class="text-right"><span class="total-amount">{{\App\Models\Cart::totalAmount()}}</span> تومان</td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td class="text-right"><strong>قابل پرداخت :</strong></td>
                                                                                <td class="text-right"><span class="total-amount">{{\App\Models\Cart::totalAmount()}}</span></td>
                                                                            </tr>
                                                                        </table>
                                                                    </div>
                                                                    <hr>
                                                                    <h2>با وارد کردن اطلاعات سفارش خود را تکمیل کنید</h2>
                                                                    <br>
                                                                    <div class="row">
                                                                        <div class="col-lg-6">
                                                                            <div class="form-group">
                                                                                <label for="province_id">استان</label>
                                                                                <select name="province_id" id="province-id" class="form-control">
                                                                                    <option value="" disabled selected>استان را انتخاب کنید</option>
                                                                                    @foreach($provinces as $province)
                                                                                        <option value="{{$province->id}}" @if(old('province_id') == $province->id) selected @endif>{{$province->name}}</option>
                                                                                    @endforeach
                                                                                </select>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-lg-6">
                                                                            <div class="form-group">
                                                                                <label for="city_id">شهر</label>
                                                                                <select name="city_id" id="city-id" class="form-control">
                                                                                    <option value=""></option>
                                                                                </select>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <br>
                                                                    <div class="row">
                                                                        <div class="col-lg-6">
                                                                            <div class="form-group">
                                                                                <label>آدرس </label>
                                                                                <input type="text" class="form-control" name="address"  placeholder="آدرس خود را وارد نمایید">
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-lg-6">
                                                                            <div class="form-group">
                                                                                <label>شماره تماس</label>
                                                                                <input type="text" class="form-control" name="mobile" placeholder="ترجیحا شماره موبایل خود را وارد کنید">
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </section>
                                                <div class="col-lg-12 col-md-12">
                                                    <button type="submit" class="default-btn btn-bg-three">
                                                            ثبت سفارش
                                                        </button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tabs_item">
                        <div class="checkout-tab-item">
                            <div class="row align-items-center">
                                <div class="col-lg-6">
                                    <div class="checkout-img">
                                        <img src="{{asset('client/images/checkout-img.png')}}" alt="Images">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Checkout Area End -->
@endsection
@section('page-scripts')
    <script>
        $(document).ready(function () {
            $('#province-id').on('change', function () {
                var idProvince = this.value;
                $("#city-id").html('');
                $.ajax({
                    url: "{{url('provinces/get-cities')}}",
                    type: "POST",
                    data: {
                        province_id: idProvince,
                        _token: '{{csrf_token()}}'
                    },
                    dataType: 'json',
                    success: function (result) {
                        $('#city-id').html('<option value=""> شهر را انتخاب کنید </option>');
                        $.each(result.cities, function (key, value) {
                            $("#city-id").append('<option value="' + value
                                .id + '">' + value.name + '</option>');
                        });
                    }
                });
            });
        });
    </script>
@endsection

