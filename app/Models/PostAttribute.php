<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PostAttribute extends Model
{
    use HasFactory;

    //Models Information Data
    /********
     * type ==0 : Category Post
     * type ==1 : blog Category Post
     * type ==2 : Blog Tags post
     * 
     * ------------------------
     *  Status==
     * ------------------------
     * 
     * 
     * Column:
     * 
     * id            =bigint(20):None,
     * src_id        =bigint(20):null
     * parent_id     =bigint(20):null
     * reff_id       =bigint(20):null
     * type          =tinyint(1):null
     * status        =varchar(20):null
     * duration      =int(6):null
     * drag          =bigint(20):null
     * addedby_id    =bigint(20):null
     * created_at    =timestamp:null
     * updated_at    =timestamp:null
     * 
     * 
     * 
     ****/



     public function post(){
        return $this->belongsTo(Post::class,'src_id');
    }
    
    
    public function gallery(){
        return $this->belongsTo(Attribute::class,'reff_id');
    }

    public function product(){
        return $this->belongsTo(Post::class,'reff_id');
    }

    public function attributeItem(){
        return $this->belongsTo(Attribute::class,'parent_id');
    }

    public function attributeItemValue(){
        $value ='unknown';
        
        if($this->attributeItem && $this->attributeItem->parent){
            $parent =$this->attributeItem->parent;
            if($parent->view==2){
                $value = $this->value_1 ?: ($this->attributeItem->icon ?: 'black');
        	}elseif($parent->view==3){
        	$value =$this->imageFile?$this->image():$this->attributeItem->image();
        	}else{
        	$value =$this->attributeItem->name;
            }
        }
        return $value;
    }

    public function attribute(){
        return $this->belongsTo(Attribute::class,'reff_id');
    }
    
    public function branch(){
        return $this->belongsTo(Attribute::class,'reff_id')->where('type',13);
    }

    public function attributeCheck(){
        return $this->belongsTo(PostAttribute::class,'reff_id','reff_id')->where('type',4);
    }


    public function attributeVatiationItems(){
        return $this->hasMany(PostAttributeVariation::class,'src_id');
    }
    


}
