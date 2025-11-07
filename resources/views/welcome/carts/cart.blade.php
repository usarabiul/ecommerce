@extends(welcomeTheme().'layouts.app') 
@section('title')
<title>{{websiteTitle('Cart Items')}}</title>
@endsection 
@section('SEO')
<meta name="title" property="og:title" content="{{websiteTitle('Cart Items')}}" />
<meta name="description" property="og:description" content="{!!general()->meta_description!!}" />
<meta name="keyword" property="og:keyword" content="{{general()->meta_keyword}}" />
<meta name="image" property="og:image" content="{{asset(general()->logo())}}" />
<meta name="url" property="og:url" content="{{route('carts')}}" />
<link rel="canonical" href="{{route('carts')}}">
@endsection 
@push('css')

<style>
  
</style>

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
            Your Cart
        </div>
    </div>
</div>
<section class="mt-50 mb-50">
    <div class="container">
        <div class="row">
            <div class="col-12 cartItemsAll">
                @include(welcomeTheme().'carts.includes.cartItems')
            </div>
        </div>
    </div>
</section>

@endsection 

@push('js') 

<script>
    $(document).ready(function(){
        
        $(document).on('change','.cartQtyChange',function(){
    
          var url = $(this).data('url');
          var qty = $(this).val();
          var Dcharge =parseInt($('.cartDeliveryCharge').text());

          if (isNaN(Dcharge)){
            Dcharge =0;
          }
        
        if(qty==''){
            qty=1;
        }
        
        $.ajax({
          url: url,
          type: 'GET',
          dataType: 'json',
          cache: false,
          data: {'qty':qty},
        })
        .done(function(data) {
            $(".cartItemsList").empty().append(data.cartItems);
            $(".headerCartItem").empty().append(data.headerCartItems);
        })
        .fail(function() {
          // alert("error");
        });
    
    
        });
    });
</script>

@endpush