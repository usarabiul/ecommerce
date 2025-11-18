@isset($carts)
	@if($carts->count() > 0)
		<div class="table-responsive">
			<table class="table shopping-summery text-center clean">
				<thead>
					<tr class="main-heading">
						<th scope="col">Image</th>
						<th scope="col">Name</th>
						<th scope="col">Price</th>
						<th scope="col">Quantity</th>
						<th scope="col">Subtotal</th>
						<th scope="col">Remove</th>
					</tr>
				</thead>
				<tbody>
					@foreach($carts as $cart)
					<tr>
						<td class="image product-thumbnail"><img src="{{asset($cart->image())}}" alt="{{$cart->product?$cart->product->name:'No Product'}}"></td>
						<td class="product-des product-name">
							<h5 class="product-name">
								@if($cart->product)
								<a href="{{route('productView',$cart->product->slug?:'no-title')}}">
									{{$cart->product->name}}
								</a>
								@else
								<span>No Product</span>
								@endif
							</h5>
							<p class="font-xs">
								<b>Size:</b> S, <b>Color:</b> Red
							</p>
						</td>
						<td class="price" data-title="Price"><span>{{priceFullFormat($cart->itemprice())}}</span></td>
						<td class="text-center" data-title="Stock">
							<div class="detail-qty border radius  m-auto">
								<a href="javascript:void(0)" class="qty-down cartUpdate" data-url="{{ route('changeToCart', [$cart, 'decrement']) }}"><i class="fi-rs-angle-small-down"></i></a>
								<span class="qty-val">{{$cart->quantity}}</span>
								<a href="javascript:void(0)" class="qty-up cartUpdate" data-url="{{ route('changeToCart', [$cart, 'increment']) }}"><i class="fi-rs-angle-small-up"></i></a>
							</div>
						</td>
						<td class="text-right" data-title="Cart">
							<span>{{priceFullFormat($cart->subtotal())}}</span>
						</td>
						<td class="action" data-title="Remove"><a href="javascript:void(0)" class="text-muted"><i class="fi-rs-trash"></i></a></td>
					</tr>
					@endforeach
					
					<tr>
						<td colspan="6" class="text-end">
							<a href="#" class="text-muted"> <i class="fi-rs-cross-small"></i> Clear Cart</a>
						</td>
					</tr>
				</tbody>
			</table>
		</div>
		<div class="divider center_icon mt-50 mb-50"><i class="fi-rs-fingerprint"></i></div>
		<div class="row mb-50">
			<div class="col-lg-6 col-md-12">
				<div class="mb-30 mt-50">
					<div class="heading_s1 mb-3">
						<h4>Apply Coupon</h4>
					</div>
					<div class="total-amount">
						<div class="left">
							<div class="coupon">
								<form action="#" target="_blank">
									<div class="form-row row justify-content-center">
										<div class="form-group col-lg-6">
											<input class="font-medium" name="Coupon" placeholder="Enter Your Coupon">
										</div>
										<div class="form-group col-lg-6">
											<button class="btn  btn-sm"><i class="fi-rs-label mr-10"></i>Apply</button>
										</div>
									</div>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-lg-6 col-md-12">
				<div class="border p-md-4 p-30 border-radius cart-totals">
					<div class="heading_s1 mb-3">
						<h4>Cart Totals</h4>
					</div>
					<div class="table-responsive">
						<table class="table">
							<tbody>
								<tr>
									<td class="cart_total_label">Cart Subtotal</td>
									<td class="cart_total_amount"><span class="font-lg fw-900 text-brand">{{priceFullFormat($cartTotalPrice)}}</span></td>
								</tr>
								<tr>
									<td class="cart_total_label">Discount</td>
									<td class="cart_total_amount"> <span class="font-lg fw-900 text-brand">{{priceFullFormat($couponDisc)}}</span></td>
								</tr>
								<tr>
									<td class="cart_total_label">Total</td>
									<td class="cart_total_amount"><strong><span class="font-xl fw-900 text-brand">{{priceFullFormat($cartTotalPrice-$couponDisc)}}</span></strong></td>
								</tr>
							</tbody>
						</table>
					</div>
					<a href="{{route('checkout')}}" class="btn "> <i class="fi-rs-box-alt mr-10"></i> Proceed To CheckOut</a>
				</div>
			</div>
		</div>
	@else
		<div class="col-lg-12 pr-lg-12 mb-6">
			<h3 class="text-white text-center">Cart is Empty</h3>
		</div>
	@endif
@endisset
