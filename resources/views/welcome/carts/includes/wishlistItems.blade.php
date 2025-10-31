@isset($wlCount)
@if($wlCount > 0)
<table class="shop-table wishlist-table">
    <thead>
        <tr>
            <th class="product-name"><span>Product</span></th>
            <th></th>
            <th class="product-price"><span>Price</span></th>
            <th class="product-stock-status"><span>Stock Status</span></th>
            <th class="wishlist-action">Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach($products as $product)
        <tr>
            <td class="product-thumbnail">
                <div class="p-relative">
                    <a href="{{route('productView',$product->slug?:Str::slug($product->name))}}">
                        <figure>
                            <img src="{{asset($product->image())}}" alt="product" width="300" height="338">
                        </figure>
                    </a>
                    <button type="submit" class="btn btn-close btn-wishlist" data-id="{{$product->id}}" data-url="{{route('wishlistCompareUpdate',[$product->id,'wishlist'])}}"><i class="fas fa-times"></i></button>
                </div>
            </td>
            <td class="product-name">
                <a href="{{route('productView',$product->slug?:Str::slug($product->name))}}">
                    {{$product->name}}
                </a>
            </td>
            <td class="product-price">
                <ins class="new-price">{{priceFullFormat($product->offerPrice())}}</ins>
            </td>
            <td class="product-stock-status">
				<span class="wishlist-in-stock text-bg-success">In Stock</span>
            </td>
            <td class="wishlist-action">
                <div class="d-lg-flex">
                    <a href="javascript:void(0)" class="btn btn-dark btn-rounded btn-sm ml-lg-2 btn-cart" data-id="{{$product->id}}" data-url="{{route('addToCart',$product->id)}}">Add to
                        cart</a>
                </div>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@else

<div class="emptyWishList" style="text-align:center;">
      <p>No Wishlist Product</p>
</div>
@endif
@endisset