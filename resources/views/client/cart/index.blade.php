@extends('client.layout.master')
@section('content')
    @include('client.layout.navbar')
<!-- Inner Banner Area -->
        <div class="inner-banner-area">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-6">
                        <div class="inner-banner-content">
                            <h2>سبد خرید</h2>
                            <ul>
                                <li><a href="{{route('index')}}">خانه</a></li>
                                <li><i class='bx bx-chevron-left'></i></li>
                                <li><a href="{{route('cart.index')}}" class="active">سبد خرید</a></li>
                            </ul>
                        </div>
                    </div>

                    <div class="col-lg-6">
                        <div class="inner-banner-img">
                            <img src="client/images/inner-banner/inner-banner11.png" alt="Inner Banner">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Inner Banner Area End -->

        <!-- Start Cart Area -->
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
														<img src="{{Storage::url($product->file->path.'/'.$product->file->name)}}" alt="{{$product->name}}" title="{{$product->name}}">
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
														<button type="submit" data-toggle="tooltip" title="بروزرسانی" onclick="updateCart({{$product->id}})" class="btn btn-primary"><i class="bx bx-refresh"></i></button>

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


							<div class="col-lg-6">
									<div class="cart-totals">
										<h3>جمع سبد خرید</h3>
										<ul>
											<li>تعداد آیتم<span class="total-items">{{\App\Models\Cart::totalItems()}}</span></li>
											<li>جمع کل <span class="total-amount"><b>{{number_format(\App\Models\Cart::totalAmount())}} تومان</b></span></li>
											<li>مبلغ قابل پرداخت<span class="total-amount"><b>{{number_format(\App\Models\Cart::totalAmount())}} تومان</b></span></li>
										</ul>
										@if(auth()->user())
										<a href="{{route('client.orders.create')}}" class="default-btn btn-bg-three">
ادامه خرید
</a>@else <span style="background-color: red;color: white;border-radius: 5px;padding: 10px"><a href="{{route('login')}}">جهت ادامه خرید باید ابتدا وارد شوید</a></span>
										@endif
									</div>
								</div>


					</div>
				</div>
			</div>
		</section>
		<!-- End Cart Area -->
@endsection