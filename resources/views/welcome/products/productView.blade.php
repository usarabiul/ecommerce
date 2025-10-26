@extends(welcomeTheme().'layouts.app') @section('title')
<title>{{websiteTitle($product->seo_title?:$product->name)}}</title>
@endsection @section('SEO')
<meta name="title" property="og:title" content="{{$product->seo_title?:$product->name.' | '.general()->title}}" />
<meta name="description" property="og:description" content="{!!$product->seo_desc?:$product->name.' '.general()->meta_description!!}" />
<meta name="keywords" content="{{$product->seo_keyword?:$product->name.' '.general()->meta_keyword}}" />
<meta name="image" property="og:image" content="{{asset($product->image())}}" />
<meta name="url" property="og:url" content="{{route('productView',$product->slug?:Str::slug($product->name))}}" />
<link rel="canonical" href="{{route('productView',$product->slug?:Str::slug($product->name))}}">
@endsection 
@push('css')
@endpush 
@section('contents')

<div class="page-header breadcrumb-wrap">
    <div class="container">
        <div class="breadcrumb">
            <a href="index.html" rel="nofollow">Home</a>
            <span></span> Fashion
            <span></span> {{$product->name}}
        </div>
    </div>
</div>
<section class="mt-50 mb-50">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="product-detail accordion-detail">
                    <div class="row mb-50">
                        <div class="col-md-6 col-sm-12 col-xs-12">
                            <div class="detail-gallery">
                                <span class="zoom-icon"><i class="fi-rs-search"></i></span>
                                <!-- MAIN SLIDES -->
                                <div class="product-image-slider">
                                    <figure class="border-radius-10">
                                        <img src="{{asset($product->image())}}" alt="{{$product->name}}">
                                    </figure>
                                    @foreach($product->galleryFiles as $img)
                                    <figure class="border-radius-10">
                                        <img src="{{asset($img->image())}}" alt="{{$product->name}}">
                                    </figure>
                                    @endforeach
                                </div>
                                <!-- THUMBNAILS -->
                                <div class="slider-nav-thumbnails pl-15 pr-15">
                                    <div><img src="{{asset($product->image())}}" alt="{{$product->name}}"></div>
                                    @foreach($product->galleryFiles as $img)
                                    <div><img src="{{asset($img->image())}}" alt="{{$product->name}}"></div>
                                    @endforeach
                                </div>
                            </div>
                            <!-- End Gallery -->
                        </div>
                        <div class="col-md-6 col-sm-12 col-xs-12">
                            <div class="detail-info">
                                <h2 class="title-detail">{{$product->name}}</h2>
                                <div class="product-detail-rating">
                                    @if($product->brand)
                                    <div class="pro-details-brand">
                                        <span> Brands: <a href="shop-grid-right.html">{{$product->brand->name}}</a></span>
                                    </div>
                                    @endif
                                    <div class="product-rate-cover text-end">
                                        <div class="product-rate d-inline-block">
                                            <div class="product-rating" style="width:90%">
                                                *****
                                            </div>
                                        </div>
                                        <span class="font-small ml-5 text-muted"> (25 reviews)</span>
                                    </div>
                                </div>
                                <div class="clearfix product-price-cover">
                                    <div class="product-price primary-color float-left">
                                        <ins><span class="text-brand">{{priceFullFormat($product->offerPrice())}}</span></ins>
                                        @if($product->regular_price > $product->offerPrice())
                                        <ins><span class="old-price font-md ml-15">{{priceFullFormat($product->regular_price)}}</span></ins>
                                        <span class="save-price  font-md color3 ml-15">{{$product->offPercentage()}}% Off</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="bt-1 border-color-1 mt-15 mb-15"></div>
                                @if($product->short_description)
                                <div class="short-desc mb-30">
                                    <p>{{$product->short_description}}</p>
                                </div>
                                @endif
                                <div class="product_sort_info font-xs mb-30">
                                    <ul>
                                        <li class="mb-10"><i class="fi-rs-crown mr-5"></i> 1 Year AL Jazeera Brand Warranty</li>
                                        <li class="mb-10"><i class="fi-rs-refresh mr-5"></i> 30 Day Return Policy</li>
                                        <li><i class="fi-rs-credit-card mr-5"></i> Cash on Delivery available</li>
                                    </ul>
                                </div>
                                <div class="attr-detail attr-color mb-15">
                                    <strong class="mr-10">Color</strong>
                                    <ul class="list-filter color-filter">
                                        <li><a href="#" data-color="Red"><span class="product-color-red"></span></a></li>
                                        <li><a href="#" data-color="Yellow"><span class="product-color-yellow"></span></a></li>
                                        <li class="active"><a href="#" data-color="White"><span class="product-color-white"></span></a></li>
                                        <li><a href="#" data-color="Orange"><span class="product-color-orange"></span></a></li>
                                        <li><a href="#" data-color="Cyan"><span class="product-color-cyan"></span></a></li>
                                        <li><a href="#" data-color="Green"><span class="product-color-green"></span></a></li>
                                        <li><a href="#" data-color="Purple"><span class="product-color-purple"></span></a></li>
                                    </ul>
                                </div>
                                <div class="attr-detail attr-size">
                                    <strong class="mr-10">Size</strong>
                                    <ul class="list-filter size-filter font-small">
                                        <li><a href="#">S</a></li>
                                        <li class="active"><a href="#">M</a></li>
                                        <li><a href="#">L</a></li>
                                        <li><a href="#">XL</a></li>
                                        <li><a href="#">XXL</a></li>
                                    </ul>
                                </div>
                                <div class="bt-1 border-color-1 mt-30 mb-30"></div>
                                <div class="detail-extralink">
                                    <div class="detail-qty border radius">
                                        <a href="#" class="qty-down"><i class="fi-rs-angle-small-down"></i></a>
                                        <span class="qty-val">1</span>
                                        <a href="#" class="qty-up"><i class="fi-rs-angle-small-up"></i></a>
                                    </div>
                                    <div class="product-extra-link2">
                                        <button type="submit" class="button button-add-to-cart">Add to cart</button>
                                        <a aria-label="Add To Wishlist" class="action-btn hover-up" href="shop-wishlist.html"><i class="fi-rs-heart"></i></a>
                                        <a aria-label="Compare" class="action-btn hover-up" href="shop-compare.html"><i class="fi-rs-shuffle"></i></a>
                                    </div>
                                </div>
                                <ul class="product-meta font-xs color-grey mt-50">
                                    <li class="mb-5">SKU: <a href="#">FWM15VKT</a></li>
                                    <li class="mb-5">Tags: <a href="#" rel="tag">Cloth</a>, <a href="#" rel="tag">Women</a>, <a href="#" rel="tag">Dress</a> </li>
                                    <li>Availability:<span class="in-stock text-success ml-5">8 Items In Stock</span></li>
                                </ul>
                            </div>
                            <!-- Detail Info -->
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-10 m-auto entry-main-content">
                            <h2 class="section-title style-1 mb-30">Description</h2>

                            <div class="description mb-50">
                                @if($product->description)
                                    {!!$product->description!!}
                                @else
                                    <h3>No description</h3>
                                @endif
                            </div>
                            @if($product->extraAttribute->count() > 0)
                            <h3 class="section-title style-1 mb-30">Additional info</h3>
                            <table class="font-md mb-30">
                                <tbody>
                                    @foreach($product->extraAttribute as $extraAttri)
                                    <tr>
                                        <th>{!!$extraAttri->name!!}</th>
                                        <td>
                                            <p>{!!$extraAttri->description!!}</p>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            @endif
                            <div class="social-icons single-share">
                                <ul class="text-grey-5 d-inline-block">
                                    <li><strong class="mr-10">Share this:</strong></li>
                                    <li class="social-facebook"><a href="#"><img src="assets/imgs/theme/icons/icon-facebook.svg" alt=""></a></li>
                                    <li class="social-twitter"> <a href="#"><img src="assets/imgs/theme/icons/icon-twitter.svg" alt=""></a></li>
                                    <li class="social-instagram"><a href="#"><img src="assets/imgs/theme/icons/icon-instagram.svg" alt=""></a></li>
                                    <li class="social-linkedin"><a href="#"><img src="assets/imgs/theme/icons/icon-pinterest.svg" alt=""></a></li>
                                </ul>
                            </div>
                            <h3 class="section-title style-1 mb-30 mt-30">Reviews (3)</h3>
                            <!--Comments-->
                            <div class="comments-area style-2">
                                <div class="row">
                                    <div class="col-lg-8">
                                        <h4 class="mb-30">Customer questions & answers</h4>
                                        <div class="comment-list">
                                            <div class="single-comment justify-content-between d-flex">
                                                <div class="user justify-content-between d-flex">
                                                    <div class="thumb text-center">
                                                        <img src="assets/imgs/page/avatar-6.jpg" alt="">
                                                        <h6><a href="#">Jacky Chan</a></h6>
                                                        <p class="font-xxs">Since 2012</p>
                                                    </div>
                                                    <div class="desc">
                                                        <div class="product-rate d-inline-block">
                                                            <div class="product-rating" style="width:90%">
                                                            </div>
                                                        </div>
                                                        <p>Thank you very fast shipping from Poland only 3days.</p>
                                                        <div class="d-flex justify-content-between">
                                                            <div class="d-flex align-items-center">
                                                                <p class="font-xs mr-30">December 4, 2020 at 3:12 pm </p>
                                                                <a href="#" class="text-brand btn-reply">Reply <i class="fi-rs-arrow-right"></i> </a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!--single-comment -->
                                            <div class="single-comment justify-content-between d-flex">
                                                <div class="user justify-content-between d-flex">
                                                    <div class="thumb text-center">
                                                        <img src="assets/imgs/page/avatar-7.jpg" alt="">
                                                        <h6><a href="#">Ana Rosie</a></h6>
                                                        <p class="font-xxs">Since 2008</p>
                                                    </div>
                                                    <div class="desc">
                                                        <div class="product-rate d-inline-block">
                                                            <div class="product-rating" style="width:90%">
                                                            </div>
                                                        </div>
                                                        <p>Great low price and works well.</p>
                                                        <div class="d-flex justify-content-between">
                                                            <div class="d-flex align-items-center">
                                                                <p class="font-xs mr-30">December 4, 2020 at 3:12 pm </p>
                                                                <a href="#" class="text-brand btn-reply">Reply <i class="fi-rs-arrow-right"></i> </a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!--single-comment -->
                                            <div class="single-comment justify-content-between d-flex">
                                                <div class="user justify-content-between d-flex">
                                                    <div class="thumb text-center">
                                                        <img src="assets/imgs/page/avatar-8.jpg" alt="">
                                                        <h6><a href="#">Steven Keny</a></h6>
                                                        <p class="font-xxs">Since 2010</p>
                                                    </div>
                                                    <div class="desc">
                                                        <div class="product-rate d-inline-block">
                                                            <div class="product-rating" style="width:90%">
                                                            </div>
                                                        </div>
                                                        <p>Authentic and Beautiful, Love these way more than ever expected They are Great earphones</p>
                                                        <div class="d-flex justify-content-between">
                                                            <div class="d-flex align-items-center">
                                                                <p class="font-xs mr-30">December 4, 2020 at 3:12 pm </p>
                                                                <a href="#" class="text-brand btn-reply">Reply <i class="fi-rs-arrow-right"></i> </a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!--single-comment -->
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <h4 class="mb-30">Customer reviews</h4>
                                        <div class="d-flex mb-30">
                                            <div class="product-rate d-inline-block mr-15">
                                                <div class="product-rating" style="width:90%">
                                                </div>
                                            </div>
                                            <h6>4.8 out of 5</h6>
                                        </div>
                                        <div class="progress">
                                            <span>5 star</span>
                                            <div class="progress-bar" role="progressbar" style="width: 50%;" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100">50%</div>
                                        </div>
                                        <div class="progress">
                                            <span>4 star</span>
                                            <div class="progress-bar" role="progressbar" style="width: 25%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">25%</div>
                                        </div>
                                        <div class="progress">
                                            <span>3 star</span>
                                            <div class="progress-bar" role="progressbar" style="width: 45%;" aria-valuenow="45" aria-valuemin="0" aria-valuemax="100">45%</div>
                                        </div>
                                        <div class="progress">
                                            <span>2 star</span>
                                            <div class="progress-bar" role="progressbar" style="width: 65%;" aria-valuenow="65" aria-valuemin="0" aria-valuemax="100">65%</div>
                                        </div>
                                        <div class="progress mb-30">
                                            <span>1 star</span>
                                            <div class="progress-bar" role="progressbar" style="width: 85%;" aria-valuenow="85" aria-valuemin="0" aria-valuemax="100">85%</div>
                                        </div>
                                        <a href="#" class="font-xs text-muted">How are ratings calculated?</a>
                                    </div>
                                </div>
                            </div>
                            <!--comment form-->
                            <div class="comment-form">
                                <h4 class="mb-15">Add a review</h4>
                                <div class="product-rate d-inline-block mb-30">
                                </div>
                                <div class="row">
                                    <div class="col-lg-8 col-md-12">
                                        <form class="form-contact comment_form" action="#" id="commentForm">
                                            <div class="row">
                                                <div class="col-12">
                                                    <div class="form-group">
                                                        <textarea class="form-control w-100" name="comment" id="comment" cols="30" rows="9" placeholder="Write Comment"></textarea>
                                                    </div>
                                                </div>
                                                <div class="col-sm-6">
                                                    <div class="form-group">
                                                        <input class="form-control" name="name" id="name" type="text" placeholder="Name">
                                                    </div>
                                                </div>
                                                <div class="col-sm-6">
                                                    <div class="form-group">
                                                        <input class="form-control" name="email" id="email" type="email" placeholder="Email">
                                                    </div>
                                                </div>
                                                <div class="col-12">
                                                    <div class="form-group">
                                                        <input class="form-control" name="website" id="website" type="text" placeholder="Website">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <button type="submit" class="button button-contactForm">Submit
                                                    Review</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @if($relatedProducts->count() > 0)
                    <div class="row mt-60">
                        <div class="col-12">
                            <h3 class="section-title style-1 mb-30">Related products</h3>
                        </div>
                        <div class="col-12">
                            <div class="row related-products">
                                @foreach($relatedProducts as $product)
                                <div class="col-lg-3 col-md-4 col-12 col-sm-6">
                                    @include(welcomeTheme().'products.includes.productGrid')
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    @endif
                    <!-- <div class="banner-img banner-big wow fadeIn f-none animated mt-50">
                        <img class="border-radius-10" src="assets/imgs/banner/banner-4.png" alt="">
                        <div class="banner-text">
                            <h4 class="mb-15 mt-40">Repair Services</h4>
                            <h2 class="fw-600 mb-20">We're an Apple <br>Authorised Service Provider</h2>
                        </div>
                    </div> -->
                </div>
            </div>
        </div>
    </div>
</section>

@endsection 
@push('js')@endpush