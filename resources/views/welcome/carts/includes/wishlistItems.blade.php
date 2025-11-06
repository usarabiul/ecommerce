@isset($wlCount)
@if($wlCount > 0)
<div class="table-responsive">
    <table class="table shopping-summery text-center">
        <thead>
            <tr class="main-heading">
                <th scope="col" colspan="2">Product</th>
                <th scope="col">Price</th>
                <th scope="col">Stock Status</th>
                <th scope="col">Action</th>
                <th scope="col">Remove</th>
            </tr>
        </thead>
        <tbody>
            @foreach($products as $product)
            <tr>
                <td class="image product-thumbnail"><img src="{{asset($product->image())}}" alt="{{$product->name}}"></td>
                <td class="product-des product-name">
                    <h5 class="product-name"><a href="{{route('productView',$product->slug?:Str::slug($product->name))}}">{{$product->name}}</a></h5>
                    <p class="font-xs">
                        <b>Size:</b> S, <b>Color:</b> Red
                    </p>
                </td>
                <td class="price" data-title="Price"><span>{{priceFullFormat($product->offerPrice())}}</span></td>
                <td class="text-center" data-title="Stock">
                    <span class="color3 font-weight-bold">In Stock</span>
                </td>
                <td class="text-right" data-title="Cart">
                    <button class="btn btn-sm"><i class="fi-rs-shopping-bag mr-5"></i>Add to cart</button>
                </td>
                <td class="action" data-title="Remove"><a href="javascript:void(0)" class="btn-wishlist" data-id="{{$product->id}}" data-url="{{route('wishlistCompareUpdate',[$product->id,'wishlist'])}}"><i class="fi-rs-trash"></i></a></td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>


@else

<div class="emptyWishList" style="text-align:center;">
      <p>No Wishlist Product</p>
</div>
@endif
@endisset