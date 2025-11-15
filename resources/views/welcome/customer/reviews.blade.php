@extends(welcomeTheme().'layouts.app') @section('title')
<title>{{websiteTitle('Profile')}}</title>
@endsection @section('SEO')
<meta name="title" property="og:title" content="{{websiteTitle('Profile')}}" />
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
            <a href="{{route('index')}}" >Home </a>
            <span></span> Review
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
                                        <h5 class="mb-0">Review</h5>
                                    </div>
                                    <div class="card-body">
                                        pred
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