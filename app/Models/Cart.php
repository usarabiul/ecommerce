<?php

namespace App\Models;

use App\Model\ProductSku;
use App\Model\Attribute;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
	protected $fillable = [
        'user_id', 
        'product_id', 
        'quantity', 
		'trans_date',
		'color',
		'size',
		'cookie',

    ];

    public function product()
    {
    	return $this->belongsTo(Post::class, 'product_id');
    }

    public function itemprice()
    {
        if($this->product){
            
            if($this->product->price_variation and $this->sku_id)
            {
                $a = ProductSku::where('id', $this->sku_id)->value('new_price');
                if($a)
                {
                    return $a;
                }
                return $this->product->orfferPrice();
            }
            return $this->product->offerPrice();
        }else{
            return 0;
        }

    }

    public function itemAttributes(){
        $options=null;
        if ($this->product && $this->sku_id) {
            if ($this->product->productAttibutesGroup()->count() > 0) {
                $options = json_decode($this->sku_id, true);
                // foreach ($options as $attributeId => $value) {
                //     $attribute = Attribute::latest()->where('type',9)->where('status','name')->where('parent_id',null)->find($attributeId);
                //     if ($attribute) {
                //         $attributeName = $attribute->name;
                //         $attributes[$attributeName] = $value;
                //     }
                // }
            }
        }
        return $options;
    }
    
    

    public function subtotal()
    {
        return $this->quantity * $this->itemprice();
    }
    
    public function InDhakaDeliveryCharge()
    {
        if($this->product){
         return   $this->quantity * $this->product->shipping_cost;
        }else{
         return   $this->quantity*0;
        }
    }
    public function OurOfDhakaDeliveryCharge()
    {
        if($this->product){
         return   $this->quantity * $this->product->shipping_cost2;
        }else{
         return   $this->quantity*0;
        }
        
        
    }
}
