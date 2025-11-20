<?php

namespace App\Http\Controllers\Welcome;

use Mail;
use Auth;
use Cookie;
use Hash;
use Validator;
use Session;
use Carbon\Carbon;
use GuzzleHttp\Client;
use App\Models\Cart;
use App\Models\General;
use App\Models\Country;
use App\Models\User;
use App\Models\Post;
use App\Models\PostExtra;
use App\Models\Transaction;
use App\Models\WishList;
use App\Models\Attribute;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\OrderItemVariation;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CartController extends Controller
{
    

    public function addToCart(Request $r,$id)
    {
      
    	$product = Post::where('type',2)->find($id);
        if(!$product){
            return abort(404);
        }
    	$qty = $r->quantity ?: 1; 
		$cookie = $r->cookie('carts');
        if(!$cookie){
            return abort(404);
        }

        $options=null;
        if($product->productAttibutesGroup()->count()){
            $options =$r->option;
            // $sku_id = $this->generateSkuIdFromOptions($options);
            // return $sku_id;
            // if(!empty($options)){
            //     foreach ($options as $attributeId => $value) {
            //         //$attribute = OrderItemVariation::where('id', $attributeId)->first();
            //         $atribute
            //     }
            // }else{
            //     echo 'need to variation Select';
            // }
        }
 
        $ct = $r->color?: null;
        $st = $r->size?: null;
        $sku = null;
        $cart = Cart::where('cookie', $cookie)->where('product_id', $product->id);
        if (!empty($options)) {
            $cart = $cart->whereJsonContains('sku_id', $options);
        }
        $cart = $cart->first();
        if(!$cart){
            $cart = new Cart;
            $cart->product_id = $product->id;
            $cart->cookie = $cookie;
            if (!empty($options)) {
            $cart->sku_id = json_encode($options);
            }
            $cart->save();
        }

        $totalQty =$cart->quantity+$qty;
        // if($totalQty < $product->productMinQty()){
        //     $message ='Product successfully added to cart';
        // }elseif($totalQty > $product->productMaxQty()){
        //     $message ='Product successfully added to cart';
        // }else{
        //     $message ='Product successfully added to cart';
        // }
        
        $cart->addedby_id = Auth::id();
        $cart->user_id = Auth::id();
        $cart->quantity = $totalQty < $product->productMinQty() ? $product->productMinQty() : ($totalQty > $product->productMaxQty()  ? $product->productMaxQty()  : $totalQty);
        $cart->save();
        
        $message ='Product successfully added to cart';
            
        if($r->ajax())
        {

            $myCart =myCart($cookie);
    		$carts = $myCart['carts'];
    		$cartsCount =  $myCart['cartsCount'];
    		$cartTotalPrice =  $myCart['cartTotalPrice'];
    		$couponDisc =  $myCart['couponDisc'];
    		$grandTotal =  $myCart['grandTotal'];
            $cartsItemsModal =view(welcomeTheme().'carts.includes.cartItems',compact('carts','cartTotalPrice','couponDisc','grandTotal'))->render();
            return Response()->json([
                'success' => true,
                'cartsCount' =>$cartsCount,
                'cartsItemsModal' =>$cartsItemsModal,
            ]);  
            
        }

        if($r->orderNow){
        	if(Auth::check()){
        	    // return redirect()->route('checkout');
        	}else{
        	    // return redirect()->route('login',['type'=>'order']);
        	}
        }
        Session::flash('success', $message);
        // return back();

        // return back();
    }

    public function generateSkuIdFromOptions($options) {
        $skuParts = [];
        foreach ($options as $attributeId => $value) {
            $skuParts[] = "{$attributeId}-{$value}";
        }
        return implode('-', $skuParts);
    }

    


    public function changeToCart(Request $r,$id,$type){

    	if($r->ajax())
        {

        	$cart =Cart::find($id);

	    	$cookie = $r->cookie('carts');

	    	if($cookie && $cart)
	    	{
	    		if($type == 'increment')
		    	{
		    		
                    if($product =$cart->product){

                        $totalQty = $cart->quantity + 1;
                        
                        $qty = $totalQty < $product->productMinQty() ? $product->productMinQty() : ($totalQty > $product->productMaxQty()  ? $product->productMaxQty()  : $totalQty);
                        $cart->update(['quantity'=> $qty]);
                        $s = true; 
                    }
                    
		    	}elseif($type == 'decrement'){
                    
                    if($product =$cart->product){
                        $totalQty = $cart->quantity - 1;
                        $qty = $totalQty < $product->productMinQty() ? $product->productMinQty() : ($totalQty > $product->productMaxQty()  ? $product->productMaxQty()  : $totalQty);
                        $cart->update(['quantity'=> $qty]);
                        $s = true; 
                    }

		    	}elseif($type == 'quantity'){
		    	    
		    	    $qty =$r->qty?:1;
		    	    
		    	    $maxLimit = $cart->product->max_order_quantity ?: $cart->product->quantity;
		    	    $minLimit = $cart->product->min_order_quantity ?: 1;
		    		if($qty <= $maxLimit && $qty >= $minLimit && $qty >= 1){

		    			$cart->update(['quantity'=> $qty]);
		    			$s = true; 

		    		}else{
		    			$s = false;
		    		}
		    	    
		    	}elseif($type == 'delete'){
		    		$cart->delete();
		    		$s = true;
		    	}

                $myCart =myCart($cookie);
                $carts = $myCart['carts'];
                $cartsCount =  $myCart['cartsCount'];
                $cartTotalPrice =  $myCart['cartTotalPrice'];
                $couponDisc =  $myCart['couponDisc'];

		    	$cartItems =view(welcomeTheme().'carts.includes.cartItems',compact('carts','cartTotalPrice','couponDisc'))->render();
                
		    	return Response()->json([
			            'success' => $s,
			            'cartsCount' =>$cartsCount,
                        'cartItems' =>$cartItems,
			          ]);


		    }else{

		    	return Response()->json([
			            'success' => false,
			          ]);

		    }

        }

    }

    public function couponApply(Request $r){

    	$check = $r->validate([
            'coupon_code' => 'required|max:100'
        ]);
        
        $coupon = Attribute::where('name', $r->coupon_code)
            ->where('status','active')
            ->whereDate('start_date', '<=', date('Y-m-d'))
            ->whereDate('end_date', '>=', date('Y-m-d'))
            ->first();
            
        if(!$coupon){
            $r->session()->forget(['my_coupon_id']);
            return back()->with('info', 'Sorry, your coupon is invalid. Please, try again with another coupon code');
        }
        $cartTotalPrice =0;
        $cookie = $r->cookie('carts');
        if($cookie){
            $carts = Cart::where('cookie', $cookie)->get();
            foreach($carts as $cart){
                $cartTotalPrice +=$cart->subtotal();
            }
        }
        
        if($coupon->min_shopping > 0 && $coupon->max_shopping > 0){
            if($cartTotalPrice >= $coupon->min_shopping && $cartTotalPrice <= $coupon->max_shopping){}else{
                $r->session()->forget(['my_coupon_id']);
                return back()->with('info', 'Sorry, you can not use coupon reason shopping Amount limit. Please, Minimum shopping '.priceFullFormat($coupon->min_shopping));
            }
        }elseif($coupon->min_shopping > 0){
            if($cartTotalPrice >= $coupon->min_shopping){}else{
                $r->session()->forget(['my_coupon_id']);
                return back()->with('info', 'Sorry, you can not use coupon reason shopping Amount limit. Please, Minimum shopping '.priceFullFormat($coupon->min_shopping));
            }
        }elseif($coupon->max_shopping > 0){
            if($cartTotalPrice <= $coupon->max_shopping){}else{
                $r->session()->forget(['my_coupon_id']);
                return back()->with('info', 'Sorry, you can not use coupon reason shopping Amount limit. Please, Maximum shopping '.priceFullFormat($coupon->max_shopping));
            }
        }
        
        $r->session()->put(['my_coupon_id'=>$coupon->id]);
        return back()->with('success', 'Your coupon code is valid and successfully added');

    }


    public function carts(Request $r){
        
    	return view(welcomeTheme().'carts.cart');
    }

    public function checkout(Request $r){
    	$user =Auth::user();
        $myCarts = myCart($r->cookie('carts'));         
        if(count($myCarts['carts']) ==0)
        {
            return redirect()->route('carts')->with('info', 'Sorry, Your Cart Is empty.');
        }
        
        
        $carts =$myCarts['carts'];
        $couponDisc =0;
         if ($mci = Session::get('my_coupon_id')) 
                {
                    $mc =Attribute::where('type',13)->where('id',$mci)->first();

                    if($mc)
                    {
                        if($mc->location=='product'){
                            $couponCarProducts =$carts->whereIn('product_id',$mc->couponProductPosts()->pluck('reff_id'));
                            foreach($couponCarProducts as $ctp){
                                $couponDisc += $mc->couponDiscountAmount($ctp->subtotal());
                            }
                        }elseif($mc->location=='category'){
                            
                        }else{
                            $couponDisc = $mc->couponDiscountAmount($myCarts['cartTotalPrice']);
                        }
                      
                    }
                }

        if($r->isMethod('post')){

            $check = $r->validate([
                'name' => 'required|max:100',
                'email' => 'nullable|max:100',
                'mobile' => 'required|max:20',
                'district' => 'required|numeric',
                'city' => 'required|numeric',
                'address' => 'required|max:500',
                'payment_method' => 'required',
            ]);
           
            $order =new Order();
            $order->user_id=Auth::check()?$user->id:null;
            $order->name=$r->name;
            $order->mobile=$r->mobile;
            $order->email=$r->email;
            $order->district=$r->district;
            $order->city=$r->city;
            $order->address=$r->address;
            $order->postal_code=$r->postal_code;
            $order->note=$r->note;
            $order->order_status='pending';
            $order->pending_at=Carbon::now();
            $order->pending_by=Auth::check()?$user->id:null;
            $order->save();
            $order->invoice=$order->created_at->format('Ymd').$order->id;
            $order->save();

            foreach($myCarts['carts'] as $cart){
                $item = new OrderItem;
                $item->order_id = $order->id;
                $item->user_id = Auth::check()?$user->id:null;
                $item->invoice = $order->invoice;
                $item->product_id = $cart->product_id;
                $item->product_name = $cart->product?$cart->product->name:null;
                $item->color = $cart->color;
                $item->size = $cart->size;
                $item->quantity = $cart->quantity;
                if($product =$cart->product){
                    if($product->variation_status){
                        
                    }else{
                        if($product->quantity > $item->quantity){
                            $product->quantity-=$item->quantity;
                            $product->sell_count+=1;
                            $product->save();
                        }
                    }
                }
                $item->price = $cart->itemprice();
                $item->total_price = $cart->subtotal();
                $item->final_price = $cart->subtotal()-$item->total_deal_discount;
                $item->pending_at = Carbon::now();
                $item->pending_by = Auth::check()?$user->id:null;
                $item->addedby_id = Auth::check()?$user->id:null;
                $item->status=$order->order_status;
                $item->order_status=$order->order_status;
                $item->save();

                $cart->delete();
            }

            if($order->district==73){
            $shippingCharge =general()->inside_dhaka_shipping_charge;
            }else{
            $shippingCharge =general()->outside_dhaka_shipping_charge;
            }
            
            $order->coupon_discount=$couponDisc;
            Session::forget('my_coupon_id');
            $order->shipping_charge =$shippingCharge?:0;
            $order->total_price=$order->items->sum('final_price');
            $order->tax=($order->total_price*general()->tax)/100;
            $order->grand_total =$order->total_price + $order->shipping_charge + $order->tax - $order->coupon_discount;
            $order->paid_amount=0;
            $order->payment_method=$r->payment_method;
            $order->due_amount=$order->grand_total;
            $order->save();

            return redirect()->route('invoiceView',$order->invoice)->with('success', 'Order successfully submitted');

        }
	    if($r->ajax() && $r->areaId){
	        $datas=Country::where('parent_id',$r->areaId?:'0000')->get();
            $geoData =View('geofilter',compact('datas'))->render();

            $cartTotalPrice =$myCarts['cartTotalPrice'];
            
            $shippingCharge =0;
            $couponDisc =$myCarts['couponDisc'];
            if($r->areaId){
                if($r->areaId==73){
                $shippingCharge =general()->inside_dhaka_shipping_charge;
                }else{
                $shippingCharge =general()->outside_dhaka_shipping_charge;
                }
            }
            
	        $grandTotal =$cartTotalPrice+$shippingCharge - $couponDisc;
	        $view  =View(welcomeTheme().'carts.includes.orderSummery',compact('carts','grandTotal','cartTotalPrice','shippingCharge','couponDisc'))->render();
	        return Response()->json([
              'success' => true,
              'view' => $view,
              'geoData' => $geoData,
            ]);
	    }

    	return view(welcomeTheme().'carts.checkout',compact('user'));
    }
    
    public function invoiceView($invoice){
        
        $order = Order::where('order_type','customer_order')->where('invoice',$invoice)->first();
        
       return view(welcomeTheme().'carts.cartInvoice',compact('order'));
    }
    

    public function orderPayment($id){

        $order =Order::find($id);

        if(!$order){
            Session::flash('error','This Order Invoic Are Not Found');
            return redirect()->route('customer.myOrders');
        }
        $active='';
        $general =General::first();

        if($general->online_payment){
            $active ='handcash_payment';
        }elseif($general->wallet_payment){
            $active ='wallet_payment';
        }else{
            $active ='online_payment';
        }
        
        //Mail Send / SMS Send
        
        //**********Send Mail***************//
        
        if($general->mail_status && $order->email){

            Mail::to($order->email)->send(new orderInvoiceMail($order));
            
        }
        
        //**********Send Mail***************//
        
         //**********Send SMS ***************//
            if($general->sms_status){
        
                //Send SMS User
                if($general->order_place_sms_customer && $order->mobile){
                    
                    $m =$order->mobile;
                    
                    $to =bdMobile($m);
                    
                    if(strlen($to) != 13)
                    {
                        return true;
                    }
                    $msg = urlencode("Your order #{$order->invoice} is Successfully Place in {$general->title}. Total Invoice Cost is {$general->currency} {$order->grand_total}."); //150 characters allowed here
        
                    $url = smsUrl($to,$msg);
                
                    $client = new Client();
                    
                    try {
                            $r = $client->request('GET', $url);
                        } catch (\GuzzleHttp\Exception\ConnectException $e) {
                        } catch (\GuzzleHttp\Exception\ClientException $e) {
                        }
                    
                    
                }
                
                //Send SMS Vendor User
                if($general->order_place_sms_vendor){
                    
                    foreach($order->items as $item){
                        
                        if($item->seller){
                            
                            if($item->seller->user){
                                
                                if($item->seller->user->mobile){
                                    
                                    $m =$item->seller->user->mobile;
                    
                                    $to =bdMobile($m);
                                    
                                    if(strlen($to) != 13)
                                    {
                                        return true;
                                    }
                                    $msg = urlencode("Your Product New order #{$order->invoice} is Successfully Place in {$general->title}. Total Cost is {$general->currency} {$item->seller_paid}."); //150 characters allowed here
                        
                                    $url = smsUrl($to,$msg);
                                
                                    $client = new Client();
                                    
                                    try {
                                            $r = $client->request('GET', $url);
                                        } catch (\GuzzleHttp\Exception\ConnectException $e) {
                                        } catch (\GuzzleHttp\Exception\ClientException $e) {
                                        }
                                    
                                }
                                
                                
                            }
                            
                        }
                        
                    }
                    
                }
                
                //Send SMS Admin
                if($general->order_place_sms_admin && $general->admin_numbers){
                    
                    $to =$general->admin_numbers;

                    $msg = urlencode("New Order in {$general->title}. Invoice: {$order->invoice}, Total Cost: {$order->grand_total}."); //150 characters allowed here
        
                    $url = smsUrl($to,$msg);
                
                    $client = new Client();
                    
                    try {
                            $r = $client->request('GET', $url);
                        } catch (\GuzzleHttp\Exception\ConnectException $e) {
                        } catch (\GuzzleHttp\Exception\ClientException $e) {
                        }
                }
                
                
                
            }
            
        //**********Send SMS ***************//
        

        return view(welcomeTheme().'carts.orderPayment',compact('order','active'));
    }
    
    public function orderPaymentSend($type,$id){
         $order =Order::find($id);

        if(!$order){
            Session::flash('error','This Order Invoic Are Not Found');
            return redirect()->route('customer.myOrders');
        }
        $general =General::first();
        $user =Auth::user();
        
        if($type=='wallet'){
            
            if($order->due_amount > $user->balance){
                Session::flash('error','Your Wallet Balance Are Not available.Please Re-charge.');
                return redirect()->route('customer.myOrders');
            }
            
            $balance =new Transaction();
            $balance->type=0;
            $balance->order_id=$order->id;
            $balance->user_id=$user->id;
            $balance->billing_name=$order->name;
            $balance->billing_mobile=$order->mobile;
            $balance->billing_email=$order->email;
            $balance->billing_address=$order->address;
            $balance->billing_note='Customer pay bill by wallet method.';
            $balance->transection_id=mt_rand(100000,999999).'TSBD'.$order->id;
            $balance->payment_method='wallet';
            $balance->amount=$order->due_amount;
            $balance->currency=$general->currency;
            $balance->status='success';
            $balance->addedby_id=Auth::id();
            $balance->save();

            $general->balance+=$balance->amount;
            $general->save();

            $user->balance -=$balance->amount;
            $user->save();

            $order->paid_amount +=$balance->amount;

            if($order->paid_amount >=$order->grand_total){
            $order->extra_amount=$order->paid_amount - $order->grand_total;
            $order->due_amount=0;
            
            }else{
            $order->extra_amount=0;
            $order->due_amount=$order->grand_total-$order->paid_amount;
            }
            
            if($order->due_amount==0){
            $order->payment_status='paid';
            }elseif($order->due_amount==$order->grand_total){
            $order->payment_status='unpaid';
            }else{
            $order->payment_status='partial';
            }

            $order->payment_method='wallet';
            $order->save();
            
            foreach($order->items as $item){
                $item->payment_status=$order->payment_status;
                $item->save();
            }
            
            //send SMS
            
            //Send Mail
            
            Session::flash('success','You Order Is Successfully Place. Thank You for Shopping!');
            return redirect()->route('customer.orderDetails',$order->id);
             
        }else if($type=='handcash'){
            
            $order->payment_method='Cash On Delivery';
            $order->save();
            
            Session::flash('success','You Order Is Successfully Place. Thank You for Shopping!');
            return redirect()->route('customer.orderDetails',$order->id);
            
        }else{
            
             Session::flash('error','Worng Paydment Method is not Allow');
            return redirect()->route('customer.myOrders');
        }
    }
    
    


    public function selectDeliveryArea(Request $r,$id){

    	if($r->ajax())
        {

	    	$cookie = $r->cookie('carts');

	    	if($cookie)
	    	{
    			$general =General::first();
    			$carts = Cart::where('cookie', $cookie)->select(['id','product_id', 'quantity','color','size'])->latest()->paginate(500);
    			
    			$deliveryCharge =0;
        	    $deliveryChargeIn =(int)($general->indhaka_charge?:0);
        	    $deliveryChargeOut =(int)($general->outofdhaka_charge?:0);
        	    $dhaka=0;
        	    
        	    foreach($carts as $cart){
        	        $productShippingIn =$cart->product?$cart->product->shipping_cost:0;
                    $deliveryChargeIn += $cart->quantity*$productShippingIn;
                    
                    $productShippingOut =$cart->product?$cart->product->shipping_cost2:0;
                    $deliveryChargeOut += $cart->quantity*$productShippingOut;
                    
        	    }
        	    
        	    if($id==15){
            		$dhaka =1;
            		$deliveryCharge =$deliveryChargeIn;
            	}elseif($id==0 || $id==null){
            	   $dhaka=0;
            	}else{
            	    $dhaka =2;
            	    $deliveryCharge =$deliveryChargeOut;
            	}
    			
	    		
	    		$datas=Country::where('parent_id',$id)->get();
	    		$geoData = View('geofilter',compact('datas'))->render();


		    	$cartTotalPrice = 0;
		    	$couponDisc = 0;

		    	foreach ($carts as $cart) 
                {
                    
                    $cartTotalPrice += $cart->subtotal();

                }

                if ($mci = Session::get('my_coupon_id')) 
                {
                    $mc = Coupon::where('id',$mci)->first();

                    if($mc)
                    {
                      $couponDisc = $cartTotalPrice * ($mc->discount / 100);
                    }
                }

                $grandTotal = $cartTotalPrice - $couponDisc;

		    	$cartSummery =view(welcomeTheme().'carts.includes.orderSummery',compact('carts','cartTotalPrice','grandTotal','couponDisc','dhaka','deliveryCharge','deliveryChargeIn','deliveryChargeOut'))->render();

    			return Response()->json([
			            'success' => true,
			            'geoData' =>$geoData,
			            'cartSummery' => $cartSummery,
			            'grandTotal' => $grandTotal+$deliveryCharge,
			          ]);

    		}



    	}


    }




    public function wishlistCompareUpdate(Request $r,$id,$action){   
        $product =Post::find($id);
        if(!$product){
            return abort(404);
        }
		$cookie = $r->cookie('carts');
        if(!$cookie){
            return redirect()->route('index');
        }

        if($action=='wishlist'){
            $statusType =0;
            $overCount =48;
        }else{
            $statusType =1;
            $overCount =4;
        }
					
        $oldData = WishList::where('cookie', $cookie)->where('type',$statusType)->where('product_id', $product->id)->first();
        if($oldData){
            $oldData->delete();
            $status =false;
            $alert=false;
        }else{
            $totalCount =WishList::where('cookie',$cookie)->where('type',$statusType)->count();
            if($overCount > $totalCount){
                $data = new WishList;
                $data->user_id = Auth::id();
                $data->product_id = $product->id;
                $data->cookie = $cookie;
                $data->type =$statusType;
                $data->save();
                $status =true;
                $alert=false;
            }else{
                $status =false;
                $alert=true;
            }
        }

        if($action=='wishlist'){
            $wlCount =WishList::where('cookie',$cookie)->where('type',$statusType)->count();
            
            $products = Post::whereHas('wishlists',function($qq)use($cookie){
                $qq->where('cookie',$cookie);
            })->paginate(48);

            $itemsView = view(welcomeTheme().'carts.includes.wishlistItems',compact('products','wlCount'))->render();

        }else{
            
            $cpCount =WishList::where('cookie',$cookie)->where('type',$statusType)->count();

            $products = Post::whereHas('comparelists',function($qq)use($cookie){
                $qq->where('cookie', $cookie);
            })->paginate(20);

            $itemsView = view(welcomeTheme().'carts.includes.compareItems',compact('products','cpCount'))->render();
        }

        if($r->ajax()){

            return Response()->json([
                'success' => true,	
                'status' => $status,
                'alert' => $alert,
                'statusType' => $statusType,
                'count' => WishList::where('cookie',$cookie)->where('type',$statusType)->count(),		        
                'itemsView' => $itemsView,	        
            ]);
            
        }else{

            return back()->with('success', 'Your Action successfully Done');;
        }


		
	}


	public function myWishlist(Request $r){
        $cookie = $r->cookie('carts');
        if(!$cookie){
            return redirect()->route('index');
        }
        $products = Post::whereHas('wishlists',function($qq)use($cookie){
                $qq->where('cookie',$cookie);
            })->paginate(20);

        return view(welcomeTheme().'carts.myWishlist',compact('products'));
	}


	public function myCompare(Request $r){
        $cookie = $r->cookie('carts');
        if(!$cookie){
            return redirect()->route('index');
        }
        $products =Post::whereHas('comparelists',function($qq)use($cookie){
            $qq->where('cookie', $cookie);
        })->paginate(20);

		return view(welcomeTheme().'carts.myCompare',compact('products'));
	}












}
