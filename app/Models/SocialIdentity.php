<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SocialIdentity extends Model
{
    use HasFactory;

    protected $fillable = [
    	'user_id', 
    	'provider_name', 
    	'provider_id',
    	'provider_token'
    ];

    //Models Information Data
    /********
     * 
     * 
     * Column:
     * 
     * id               =bigint(20):None,
     * user_id          =bigint(20):null,
     * provider_name    =varchar(255):null,
     * provider_id      =varchar(255):null,
     * provider_token   =varchar(255):null,
     * provider_img_url =varchar(255):null,
     * created_at       =timestamp:null
     * updated_at       =timestamp:null
     * 
     * 
     * 
     ****/


    public function user() {
        return $this->belongsTo(User::class);
    }



}
