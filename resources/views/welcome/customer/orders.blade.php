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
                        <div class="tab-content dashboard-content">
                            <div class="tab-pane fade active show" id="orders" role="tabpanel" aria-labelledby="orders-tab">
                                <div class="card">
                                    <div class="card-header">
                                        <h5 class="mb-0">Your Orders</h5>
                                    </div>
                                    <div class="card-body">
                                        <div class="table-responsive">
                                            <table class="table">
                                                <thead>
                                                    <tr>
                                                        <th>Order</th>
                                                        <th>Date</th>
                                                        <th>Status</th>
                                                        <th>Total</th>
                                                        <th>Actions</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td>#1357</td>
                                                        <td>March 45, 2020</td>
                                                        <td>Processing</td>
                                                        <td>$125.00 for 2 item</td>
                                                        <td><a href="#" class="btn-small d-block">View</a></td>
                                                    </tr>
                                                    <tr>
                                                        <td>#2468</td>
                                                        <td>June 29, 2020</td>
                                                        <td>Completed</td>
                                                        <td>$364.00 for 5 item</td>
                                                        <td><a href="#" class="btn-small d-block">View</a></td>
                                                    </tr>
                                                    <tr>
                                                        <td>#2366</td>
                                                        <td>August 02, 2020</td>
                                                        <td>Completed</td>
                                                        <td>$280.00 for 3 item</td>
                                                        <td><a href="#" class="btn-small d-block">View</a></td>
                                                    </tr>
                                                </tbody>
                                            </table>
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