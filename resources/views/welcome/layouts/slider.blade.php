@if($slider =slider('Front Page Slider'))
<div class="position-relative">
    <div class="hero-slider-1 style-3 dot-style-1 dot-style-1-position-1">

        @foreach($slider->subSliders as $i=>$slider)
        <div class="single-hero-slider single-animation-wrap">
            <div class="container">
                <div class="slider-1-height-3 slider-animated-1">
                    <div class="hero-slider-content-2">
                        <h4 class="animated">Trade-In Offer</h4>
                        <h2 class="animated fw-900">Supper Value Deals</h2>
                        <h1 class="animated fw-900 text-brand">On All Products</h1>
                        <p class="animated">Save more with coupons & up to 70% off</p>
                        @if($slider->seo_title && $slider->seo_description)
                        <a class="animated btn btn-brush btn-brush-3" href="{{$slider->seo_description}}"> {!!$slider->seo_title!!} </a>
                        @endif
                    </div>
                    <div class="slider-img">
                        <img src="{{asset($slider->image())}}" alt="{{$slider->name}}">
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
    <div class="slider-arrow hero-slider-1-arrow style-3"></div>
</div>
@endif