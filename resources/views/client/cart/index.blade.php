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
                            <img src="client/images/inner-banner/inner-banner3.png" alt="Inner Banner">
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
						<form>
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
											<tr>
												<td class="product-thumbnail">
													<a href="{{route('showProduct',$product)}}">
														<img src="{{Storage::url($product->file->path.'/'.$product->file->name)}}" alt="{{$product->name}}" title="{{$product->name}}">
													</a>
												</td>

												<td class="product-name">
													<a href="{{route('showProduct',$product)}}">{{$product->name}}</a>
                                                </td>
                                                
												<td class="product-price">
													<span class="unit-amount">{{$product->cost_with_discount}} تومان</span>
												</td>

												<td class="product-quantity">
													<span>{{$productQty}}</span>
												</td>

												<td class="product-subtotal">
													<span class="subtotal-amount" id="total-amount-{{$product->id}}">{{$product->cost_with_discount * $productQty}}</span> تومان

													<a  class="remove">
														<button type="button" data-toggle="tooltip" title="حذف" class="btn btn-danger" onClick="removeFromCart({{$product->id}})"><i class="fa fa-times-circle"></i></button>
													</a>
												</td>
											</tr>
										@endforeach
										</tbody>
									</table>
								</div>
								<div class="row">
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
								</div>

								<div class="cart-buttons">
									<div class="row align-items-center">
										<div class="col-lg-7 col-sm-7 col-md-7">
											<div class="continue-shopping-box">
												<a href="#" class="default-btn btn-bg-three">
ادامه خرید
</a>
											</div>
										</div>
									</div>
								</div>
                            </div>
                            
							<div class="row">
								<div class="col-lg-6">
									<div class="cart-calc">
										<div class="cart-wraps-form"> 
											<h3>محاسبه حمل و نقل</h3>
											<div class="row">
												<div class="col-lg-6">
													<div class="form-group">
														<select>
															<option value="">کارت اعتباری</option>
															<option value="">گزینه ی دیگر</option>
															<option value="">گزینه بعد</option>
														</select>	
													</div>
                                                </div>
												<div class="form-group col-lg-6">
													<input type="text" class="form-control" placeholder="شماره کارت اعتباری">
												</div>
												<div class="form-group col-12">
													<input type="text" class="form-control" placeholder="شماره تایید کارت اعتباری">
												</div>
											</div>
											<div class="form-group">
												<input type="text" class="form-control" placeholder="کد تخفیف">
											</div>
											<a href="#" class="default-btn btn-bg-three">
اعمال تخفیف
</a>
										</div>
									</div>
                                </div>
                                
								<div class="col-lg-6">
									<div class="cart-totals">
										<h3>جمع سبد خرید</h3>
										<ul>
											<li>جمع کل <span>15000 تومان</span></li>
											<li>ارسال<span>3000 تومان</span></li>
											<li>کد تخفیف<span>2000 تومان</span></li>
											<li>جمع <span><b>16000 تومان</b></span></li>
										</ul>
										<a href="#" class="default-btn btn-bg-three">
ادامه خرید
</a>
									</div>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</section>
		<!-- End Cart Area -->
@endsection