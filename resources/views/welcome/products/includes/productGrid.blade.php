<div class="product-cart-wrap mb-30">
    <div class="product-img-action-wrap">
        <div class="product-img product-img-zoom">
            <a href="{{route('productView',$product->slug?:'')}}">
                <img class="default-img" src="{{asset($product->image())}}" alt="{{$product->name}}">
                <img class="hover-img" src="{{asset($product->hoverImage())}}" alt="{{$product->name}}">
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
        @if($ctg =$product->productCategories()->first())
        <div class="product-category">
            <a href="{{route('productCategory',$ctg->slug?:'no-title')}}">{{$ctg->name}}</a>
        </div>
        @endif
        <h2><a href="{{route('productView',$product->slug?:'')}}">{{$product->name}}</a></h2>
        <div class="rating-result" title="90%">
            <span>
                <span>{{$product->productRating()}}</span>
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