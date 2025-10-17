@extends(welcomeTheme().'layouts.app') 
@section('title')
<title>{{websiteTitle()}}</title>
@endsection 
@section('SEO')
<meta name="title" property="og:title" content="{{general()->meta_title}}" />
<meta name="description" property="og:description" content="{!!general()->meta_description!!}" />
<meta name="keyword" property="og:keyword" content="{{general()->meta_keyword}}" />
<meta name="image" property="og:image" content="{{asset(general()->logo())}}" />
<meta name="url" property="og:url" content="{{route('index')}}" />
<link rel="canonical" href="{{route('index')}}">
@endsection 
@push('css')
<script type="application/ld+json">
    { 
    "@context": "https://schema.org", 
    "@type": "WebPage", 
    "url": "{{route('index')}}", 
    "name": "{{websiteTitle()}}",
    "author": {
        "@type": "Webpage",
        "name": "{{websiteTitle()}}"
    },
    "description": "{!!general()->meta_description!!}"
    }
</script>
@endpush 

@section('contents')

<section class="home-slider position-relative pt-25 pb-20">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                @include(welcomeTheme().'layouts.slider')
            </div>
        </div>
    </div>
</section>

@if($menu = menu('Popular Categories'))
<section class="popular-categories section-padding mt-15 mb-25">
    <div class="container wow fadeIn animated">
        <h3 class="section-title mb-20"><span>Popular</span> Categories</h3>
        <div class="carausel-6-columns-cover position-relative">
            <div class="slider-arrow slider-arrow-2 carausel-6-columns-arrow" id="carausel-6-columns-arrows"></div>
            <div class="carausel-6-columns" id="carausel-6-columns">
                @foreach($menu->subMenus as $menu)
                <div class="card-1">
                    <figure class=" img-hover-scale overflow-hidden">
                        <a href="{{asset($menu->menuLink())}}"><img src="{{asset($menu->image())}}" alt="{{$menu->menuName()}}"></a>
                    </figure>
                    <h5><a href="{{asset($menu->menuLink())}}">{{$menu->menuName()}}</a></h5>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</section>
@endif

@if($latestProducts->count() > 0)
<section class="mt-50 mb-50">
    <div class="container">
        <div class="row product-grid-4">
            @foreach($latestProducts as $product)
            <div class="col-lg-3 col-md-4 col-12 col-sm-6">

                <div class="product-cart-wrap mb-30">
                    <div class="product-img-action-wrap">
                        <div class="product-img product-img-zoom">
                            <a href="shop-product-right.html">
                                <img class="default-img" src="{{asset($product->image())}}" alt="{{$product->name}}">
                                <img class="hover-img" src="{{asset($product->image())}}" alt="{{$product->name}}">
                            </a>
                        </div>
                        <div class="product-action-1">
                            <a aria-label="Quick view" class="action-btn hover-up" data-bs-toggle="modal" data-bs-target="#quickViewModal"><i class="fi-rs-eye"></i></a>
                            <a aria-label="Add To Wishlist" class="action-btn hover-up" href="shop-wishlist.html"><i class="fi-rs-heart"></i></a>
                            <a aria-label="Compare" class="action-btn hover-up" href="shop-compare.html"><i class="fi-rs-shuffle"></i></a>
                        </div>
                        <div class="product-badges product-badges-position product-badges-mrg">
                            <span class="hot">Hot</span>
                        </div>
                    </div>
                    <div class="product-content-wrap">
                        <div class="product-category">
                            <a href="shop-grid-right.html">Clothing</a>
                        </div>
                        <h2><a href="shop-product-right.html">{{$product->name}}</a></h2>
                        <div class="rating-result" title="90%">
                            <span>
                                <span>90%</span>
                            </span>
                        </div>
                        <div class="product-price">
                            <span>{{priceFullFormat($product->offerPrice())}}</span>
                            @if($product->regular_price > $product->offerPrice())
                            <span class="old-price">{{priceFullFormat($product->regular_price)}}</span>
                            @endif
                        </div>
                        <div class="product-action-1 show">
                            <a aria-label="Add To Cart" class="action-btn hover-up" href="shop-cart.html"><i class="fi-rs-shopping-bag-add"></i></a>
                        </div>
                    </div>
                </div>

            </div>
            @endforeach
        </div>
    </div>
</section>
@endif


@endsection @push('js') @endpush