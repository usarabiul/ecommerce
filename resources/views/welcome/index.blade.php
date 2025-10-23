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
                @include(welcomeTheme().'products.includes.productGrid')
            </div>
            @endforeach
        </div>
    </div>
</section>
@endif


@endsection @push('js') @endpush