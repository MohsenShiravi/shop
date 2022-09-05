@extends('client.layout.master')
@section('content')
    @include('client.layout.navbar')
<!-- Inner Banner Area -->
        <div class="inner-banner-area">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-6">
                        <div class="inner-banner-content">
                            <h2>علاقه‌مندی‌ها</h2>
                            <ul>
                                <li><a href="{{route('index')}}">خانه</a></li>
                                <li><i class='bx bx-chevron-left'></i></li>
                                <li><a href="{{route('client.likes.index')}}" class="active">علاقه‌مندی‌ها</a></li>
                            </ul>
                        </div>
                    </div>

                    <div class="col-lg-6">
                        <div class="inner-banner-img">
                            <img src="{{asset('client/images/inner-banner/inner-banner4.png')}}" alt="Inner Banner">
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
												<th scope="col">دسته بندی</th>
												<th scope="col">سبد خرید</th>

											</tr>
										</thead>

										<tbody>
										@foreach($products as $product)
											<tr>
												<td class="product-thumbnail">
													<a href="#">
														<img src="{{Storage::url($product->file->path.'/'.$product->file->name)}}" alt="{{$product->name}}" title="{{$product->name}}">
													</a>
												</td>

												<td class="product-name">
													<a href="#">{{$product->name}}</a>
												</td>

												<td class="product-price">
													<span class="unit-amount"> {{$product->cost}}</span>
												</td>
												<td class="product-category-area">
													<span class="unit-amount">{{$product->category->title}}</span>
												</td>

												<td class="product-quantity">
													<a href="#" class="default-btn btn-bg-three">افزودن به سبد خرید</a>
												</td>

												<td class="product-subtotal">
													<a href="{{route('client.likes.destroy', $product)}}" class="remove">
														<i class='bx bx-x-circle'></i>
													</a>
												</td>
											</tr>
										@endforeach
										</tbody>
									</table>
								</div>
                            </div>
						</form>
					</div>
				</div>
			</div>
		</section>
		<!-- End Cart Area -->
@endsection