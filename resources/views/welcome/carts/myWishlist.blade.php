@extends(welcomeTheme().'layouts.app') 
@section('title')
<title>{{websiteTitle('My WishList')}}</title>
@endsection 
@section('SEO')
<meta name="title" property="og:title" content="{{websiteTitle('My WishList')}}" />
<meta name="description" property="og:description" content="{!!general()->meta_description!!}" />
<meta name="keyword" property="og:keyword" content="{{general()->meta_keyword}}" />
<meta name="image" property="og:image" content="{{asset(general()->logo())}}" />
<meta name="url" property="og:url" content="{{route('myWishlist')}}" />
<link rel="canonical" href="{{route('myWishlist')}}">
@endsection 
<style>
.wishlist-table .wishlist-action {
    width: 24.19%;
        text-align: left;
}
.shop-table .product-thumbnail {
    width: 11rem;
    padding-right: 1rem;
}

.shop-table td {
    padding: 2rem 0 2rem 0;
    border-top: 1px solid #eee;
    font-size: 1.4rem;
}

.product-price .new-price {
    color: #fff !important;
}
.p-relative {
    position: relative !important;
}
.shop-table .btn-close {
    position: absolute;
    padding: 0;
    background: #fff;
    border: 2px solid #fff;
    width: 20px;
    height: 20px;
    border-radius: 50%;
    box-shadow: 0 2px 6px 0 rgba(0, 0, 0, 0.4);
    top: -14px;
    right: -8px;
}
td.product-stock-status {
    text-align: center;
}
td.product-price {
    text-align: center;
}
.social-icons {
    margin: 20px 0;
}
.social-no-color .social-icon {
    color: #fff !important;
}
.btn-quickview {
    background-color: #fff !important;
    border-color: #fff !important;
}
</style>
@push('css')
@endpush 

@section('contents')

<div class="page-header breadcrumb-wrap">
    <div class="container">
        <div class="breadcrumb">
            <a href="index.html" rel="nofollow">Home</a>
            <span></span> 
            @if($pg =pageTemplate('Latest Product'))
            <a href="{{route('pageView',$pg->slug?:'no-title')}}" rel="nofollow">{{$pg->name}}</a>
            <span></span>
            @endif
            Wishlist
        </div>
    </div>
</div>
<section class="mt-50 mb-50">
    <div class="container">
        <div class="row">
            <div class="col-12 mywishList">
                @include(general()->theme.'.carts.includes.wishlistItems')
            </div>
        </div>
    </div>
</section>

@endsection @push('js') @endpush