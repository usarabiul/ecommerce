<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class OrderItemVariation extends Model
{

    public function item(){
        return $this->belongsTo(Order::class);
    }

    public function product(){
        return $this->belongsTo(Post::class,'product_id')->where('type',2);
    }


}
