@extends(welcomeTheme().'layouts.app') @section('title')
<title>{{websiteTitle('Dashboard')}}</title>
@endsection @section('SEO')
<meta name="title" property="og:title" content="{{websiteTitle('Dashboard')}}" />
        <meta name="description" property="og:description" content="{!!general()->meta_description!!}" />
        <meta name="keywords" content="{{general()->meta_keyword}}" />
        <meta name="image" property="og:image" content="{{asset(general()->logo())}}" />
        <meta name="url" property="og:url" content="{{route('customer.dashboard')}}" />
        <link rel="canonical" href="{{route('customer.dashboard')}}">
@endsection
 @push('css')
 <style>

 </style>
@endpush 

@section('contents')
<div class="page-header breadcrumb-wrap">
    <div class="container">
        <div class="breadcrumb">
            <a href="{{route('index')}}" rel="nofollow">Home </a>
            <span></span> Orders
        </div>
    </div>
</div>

<section class="pt-50 pb-50">
    <div class="container">
        <div class="row">
            <div class="col-lg-10 m-auto">
                <div class="row">
                    <div class="col-md-4">
                        @include(welcomeTheme().'customer.sidebar')
                    </div>
                    <div class="col-md-8">
                           <div class="invoicePage PrintAreaContact">
                                <div class="container invoiceContainer">
                                    <div class="invoice-inner">
                                        <div class="invoice-header">
                                            <div class="row">
                                                <div class="col-4">
                                                    <img src="{{asset(general()->logo())}}">
                                                </div>
                                                <div class="col-1"></div>
                                                <div class="col-7" style="text-align: end;">
                                                    <h6>CONTACT INFORMATION:</h6>
                                                    <p>
                                                        {{general()->address_one}}<br>
                                                        {{general()->mobile}}<br>
                                                        {{general()->website}}<br>
                                                        {{general()->email}}
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                        <hr style="margin: 0;">
                                        <h2>INVOICE</h2>
                                        <div class="orderInfo">
                                            <div class="row">
                                                <div class="col-3">
                                                    <p>
                                                        <b>Order To:</b><br>
                                                        <b>Name:</b> {{ $order->name }}<br>
                                                        <b>Mobile:</b> {{ $order->mobile }}<br>
                                                        <b>Address:</b> {{ $order->fullAddress() }}
                                                    </p>
                                                </div>
                                                <div class="col-3">
                                                </div>
                                                <div class="col-6">
                                                    <div class="ordrinfotable">
                                                        <table class="tableOrderinfo table">
                                                        <thead>
                                                            <tr>
                                                            <td style="width: 40%;">Invoice Number</td>
                                                            <td>: {{ $order->invoice }}</td>
                                                            </tr>
                                                            <tr>
                                                            <td style="width: 40%;">Invoice Date</td>
                                                            <td>: {{ $order->created_at->format('d-m-Y h:i A') }}</td>
                                                            </tr>
                                                            <tr>
                                                            <td style="width: 40%;">Order Status</td>
                                                            <td>: {{ucfirst($order->order_status)}}</td>
                                                            </tr>
                                                            <tr>
                                                            <td style="width: 40%;">Payment Method</td>
                                                            <td>: {{ucfirst($order->payment_method)}}</td>
                                                            </tr>
                                                        </thead>
                                                        </table>
                                                    </div>							
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <div class="table-responsive">
                                            <div class="mainTable">
                                                <table class="table mainproducttable">
                                                <thead>
                                                    <tr class="headerTable">
                                                    <td style="width: 40%;">Product Name & Description</td>
                                                    <td style="width: 10%; text-align: center;">Unit Price</td>
                                                    <td style="width: 15%; text-align: center;">Quantity</td>
                                                    <td style="width: 15%; text-align: center;">Total Price</td>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    
                                                    @foreach($order->items as $i=>$item)
                                                    <tr>
                                                    <td>{{ $item->product_name }}
                                                        @if($item->color)
                                                        <b>Color:</b> {{$item->color}}
                                                        @endif
                                                        @if($item->size)
                                                        <b>Size:</b> {{$item->size}}
                                                        @endif
                                                    </td>
                                                    <td style="text-align: center;">{{ priceFormat($item->price) }}</td>
                                                    <td style="text-align: center;">{{$item->quantity}}</td>
                                                    <td style="text-align: center;">{{ priceFormat($item->final_price) }}</td>
                                                    </tr>
                                                    @endforeach
                                                    
                                                    <tr>
                                                    <td colspan="3" style="text-align: end;">Subtotal</td>
                                                    <td style="text-align: center;">{{ priceFormat($order->total_price) }}</td>
                                                    </tr>
                                                    <tr>
                                                    <td colspan="3" style="text-align: end;">Discount</td>
                                                    <td style="text-align: center;">{{ priceFormat($order->coupon_discount) }}</td>
                                                    </tr>
                                                    <tr>
                                                    <td colspan="3" style="text-align: end;">Shipping</td>
                                                    <td style="text-align: center;">
                                                    @if($order->shipping_charge>0)
                                                    {{priceFormat($order->shipping_charge)}}
                                                    @else
                                                    Free Shipping
                                                    @endif
                                                    </td>
                                                    </tr>
                                                    <tr>
                                                    <td colspan="3" style="text-align: end;">Grand Total</td>
                                                    <td style="text-align: center;">{{ priceFormat($order->grand_total) }}</td>
                                                    </tr>
                                                </tbody>
                                                </table>
                                            </div>
                                        </div>
                    
                                        <div class="frozenTable">
                                            <div class="row">
                                                <div class="col-md-5">

                                                </div>
                                                <div class="col-md-7">
                                                    @if($order->payment_status=='paid')
                                                    <div class="paidsStatus" style="text-align:center;">
                                                        <img src="{{asset('public/medies/paid.png')}}" style="max-width:120px;">
                                                    </div>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                    
                                        <div class="footerInvoice">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <p>Thank you for shopping from {{general()->title}}</p>
                                                </div>
                                                <div class="col-md-6" style="text-align: end;">
                                                    ------------------------
                                                    <p>Authorized Sign</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection 

@push('js') 

@endpush