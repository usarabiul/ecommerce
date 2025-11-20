@extends(welcomeTheme().'layouts.app') 
@section('title')
<title>{{websiteTitle('Checkout')}}</title>
@endsection 
@section('SEO')
<meta name="title" property="og:title" content="{{websiteTitle('Checkout')}}" />
        <meta name="description" property="og:description" content="{!!general()->meta_description!!}" />
        <meta name="keyword" property="og:keyword" content="{{general()->meta_keyword}}" />
        <meta name="image" property="og:image" content="{{asset(general()->logo())}}" />
        <meta name="url" property="og:url" content="{{route('checkout')}}" />
        <link rel="canonical" href="{{route('checkout')}}">
@endsection 
@push('css')
<style>
 

</style>
@endpush 

@section('contents')

<div class="page-header breadcrumb-wrap">
    <div class="container">
        <div class="breadcrumb">
            <a href="index.html" rel="nofollow">Home</a>
            <span></span>
            <a href="{{route('carts')}}" rel="nofollow">Cart</a>
            <span></span> Checkout
        </div>
    </div>
</div>
<section class="mt-50 mb-50">
    <div class="container">
        @isset($carts)
            @if($carts->count() > 0)
            <form method="post" action="{{route('checkout')}}" method="post">
                @csrf
                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-25">
                            <h4>Billing Details</h4>
                        </div>
                        <div class="form-group">
                            <input type="text" required="" name="name" value="{{old('name')}}" placeholder="Enter your name *">
                        </div>
                        <div class="form-group">
                            <input type="text" required="" name="mobile" value="{{old('mobile')}}" placeholder="Enter Mobbile number *">
                        </div>
                        <div class="form-group">
                            <input type="email" name="email" value="{{old('email')}}" placeholder="Enter Email Address">
                        </div>
                        <div class="row">
                            <div class="col-md-6 form-group mb-3">
                                <div class="custom_select">
                                    <select name="district" id="district" class="form-control" required>
                                        <option value="">Select District*</option>
                                        @foreach(geoData(3) as $data)
                                        <option value="{{$data->id}}" >{{$data->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6 form-group mb-3">
                                <div class="custom_select">
                                    <select name="city" id="city" class="form-control" required>
                                        <option value="">Select City*</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <input type="text" name="address" value="{{old('address')}}" required="" placeholder="Address *">
                        </div>
                        <div class="mb-20">
                            <h5>Additional information</h5>
                        </div>
                        <div class="form-group mb-30">
                            <textarea rows="5" placeholder="Order notes">{{old('address')}}</textarea>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="order_review">
                            <div class="mb-20">
                                <h4>Your Orders</h4>
                            </div>
                            <div class="table-responsive order_table text-center">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th colspan="2">Product</th>
                                            <th style="width: 150px;">Total</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                
                                        @foreach($carts as $cart)
                                        <tr>
                                            <td class="image product-thumbnail" style="width: 120px;"><img src="{{asset($cart->image())}}" alt="{{$cart->product?$cart->product->name:'No Product'}}"></td>
                                            <td>
                                                <h5>
                                                    @if($product =$cart->product)
                                                    <a href="{{route('productView',$product->slug?:Str::slug($product->name))}}">{{$product->name}}</a> 
                                                    <br>
                                                    <b>Size:</b> S, <b>Color:</b> Red 
                                                    @else
                                                    <span>No Product</span>
                                                    @endif
                                                </h5>
                                                <span class="product-qty">{{priceFullFormat($cart->itemprice())}} x {{$cart->quantity}}</span>
                                            </td>
                                            <td >{{priceFullFormat($cart->subtotal())}}</td>
                                        </tr>
                                        @endforeach
                                        <tr>
                                            <th>SubTotal</th>
                                            <td class="product-subtotal" colspan="2">{{priceFullFormat($cartTotalPrice)}}</td>
                                        </tr>
                                        <tr>
                                            <th>Discount</th>
                                            <td colspan="2">{{priceFullFormat($couponDisc)}}</td>
                                        </tr>
                                        <tr>
                                            <th>Shipping</th>
                                            <td colspan="2">
                                                @if($shippingCharge > 0)
                                                {{priceFullFormat($shippingCharge)}}
                                                @else
                                                <em>Free Shipping</em>
                                                @endif
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>Total</th>
                                            <td colspan="2" class="product-subtotal"><span class="font-xl text-brand fw-900">{{priceFullFormat($grandTotal)}}</span></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="bt-1 border-color-1 mt-30 mb-30"></div>
                            <div class="payment_method">
                                <div class="mb-25">
                                    <h5>Payment</h5>
                                </div>
                                <div class="payment_option">
                                    <div class="custome-radio">
                                        <input class="form-check-input" required="" type="radio" name="payment_method" id="exampleRadios3" value="bank" >
                                        <label class="form-check-label" for="exampleRadios3" data-bs-toggle="collapse" data-target="#bankTranfer" aria-controls="bankTranfer">Direct Bank Transfer</label>
                                        <div class="form-group collapse in" id="bankTranfer">
                                            <p class="text-muted mt-5">There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration. </p>
                                        </div>
                                    </div>
                                    <div class="custome-radio">
                                        <input class="form-check-input" required="" type="radio" name="payment_method" id="exampleRadios4" value="check" >
                                        <label class="form-check-label" for="exampleRadios4" data-bs-toggle="collapse" data-target="#checkPayment" aria-controls="checkPayment">Check Payment</label>
                                        <div class="form-group collapse in" id="checkPayment">
                                            <p class="text-muted mt-5">Please send your cheque to Store Name, Store Street, Store Town, Store State / County, Store Postcode. </p>
                                        </div>
                                    </div>
                                    <div class="custome-radio">
                                        <input class="form-check-input" required="" type="radio" name="payment_method" id="exampleRadios5" value="Cash On Delivery" checked="">
                                        <label class="form-check-label" for="exampleRadios5" data-bs-toggle="collapse" data-target="#paypal" aria-controls="paypal">Cash On Delivery</label>
                                        <div class="form-group collapse in" id="paypal">
                                            <p class="text-muted mt-5">Pay via PayPal; you can pay with your credit card if you don't have a PayPal account.</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-fill-out btn-block mt-30">Place Order</button>
                        </div>
                    </div>
                </div>
            </form>
            @else
                <div class="cart_empty">
                    <i class="linearicons-cart"></i>
                    <h4>Empty Cart</h4>
                    <a href="{{route('index')}}" class="btn btn-fill-line rounded-0 view-cart">Shopping</a>
                </div>
            @endif
        @endisset

    </div>
</section>

@endsection 

@push('js') 

<script>
    $(document).ready(function(){
        
        $('.selectDateDelivery').change(function(date){
            var dateV =$(this).val();
            var lastDay =3;
            $( "#datepicker" ).datepicker({
            	minDate: +lastDay,
       			maxDate: "+30D"
            });
                
            if(dateV!=''){
                alert(dateV);
            }
                
        });
        
         $("#district").on("change", function(){
                var id = $(this).val();
                  if(id==''){
                   $('#city').empty().append('<option value="">No City</option>');
                  }else{
                      var url = '{{url("geo/filter")}}/'+id;
                      $.get(url,function(data){
                        $('#city').empty().append(data.geoData);  
                      });  
                  }
            });
        
    });
</script>

@endpush