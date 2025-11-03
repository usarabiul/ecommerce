@extends(welcomeTheme().'layouts.app') @section('title')
<title>{{websiteTitle('Search')}}</title>
@endsection @section('SEO')
<meta name="title" property="og:title" content="{{websiteTitle('Search')}}" />
        <meta name="description" property="og:description" content="{!!general()->meta_description!!}" />
        <meta name="keywords" content="{{general()->meta_keyword}}" />
        <meta name="image" property="og:image" content="{{asset(general()->favicon())}}" />
        <meta name="url" property="og:url" content="{{route('search')}}" />
        <link rel="canonical" href="{{route('search')}}">
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
            <span></span> Search
        </div>
    </div>
</div>
<section class="mt-50 mb-50">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="shop-product-fillter">
                    <div class="totall-product">
                        <p> We found  <strong class="text-brand">{{$products->total()}} </strong> items for you! </p>
                    </div>
                    <div class="sort-by-product-area">
                        <div class="sort-by-cover">
                            <div class="sort-by-product-wrap">
                                <div class="sort-by">
                                    <span><i class="fi-rs-apps-sort"></i>Sort by: </span>
                                </div>
                                <div class="sort-by-dropdown-wrap">
                                    <span> Latest  <i class="fi-rs-angle-small-down"></i></span>
                                </div>
                            </div>
                            <div class="sort-by-dropdown">
                                <ul>
                                    <li><a class="active" href="#">Latest </a></li>
                                    <li><a href="#">Price: Low to High </a></li>
                                    <li><a href="#">Price: High to Low </a></li>
                                    <li><a href="#">Release Date </a></li>
                                    <li><a href="#">Avg. Rating </a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row product-grid-3">
            @foreach($products as $product)
            <div class="col-lg-3 col-md-4">
                @include(welcomeTheme().'products.includes.productGrid')
            </div>
            @endforeach
        </div>
        {{$products->links('pagination')}}
    </div>
</section>

@endsection 

@push('js') @endpush