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
            <span></span> Profile
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
                                        <h5 class="mb-0">Change Password</h5>
                                    </div>
                                    <div class="card-body">
                                        @include(welcomeTheme().'alerts')
                                        <form method="post" action="{{route('customer.changePassword')}}" method="post">
                                            @csrf
                                            <div class="row">
                                                <div class="form-group col-md-12">
                                                    <label>Current Password <span class="required">*</span></label>
                                                    <div class="input-group">
                                                        <input required="" type="password" class="password" name="current_password" placeholder="Current Password" style="flex: 1 1 auto;width: 1%;">
                                                        <div class="input-group-text showPassword">
                                                            <i class="fa fa-eye-slash"></i>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group col-md-12">
                                                    <label>Password <span class="required">*</span></label>
                                                    <input required="" class="form-control password " name="mobile" value="{{old('mobile')}}" type="password" placeholder="Enter password">
                                                </div>
                                                <div class="form-group col-md-12">
                                                    <label>Confirm Password <span class="required">*</span></label>
                                                    <input required="" class="form-control password" name="email" value="{{old('email')}}" type="password" placeholder="Enter confirm password">
                                                </div>
                                                <div class="col-md-12">
                                                    <button type="submit" class="btn btn-fill-out submit" name="submit" value="Submit">Save</button>
                                                </div>
                                            </div>
                                        </form>
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