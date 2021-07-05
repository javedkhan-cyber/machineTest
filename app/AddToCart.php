<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AddToCart extends Model
{
    protected $table = 'products';
    protected $fillable = ['product_id','user_id','size','quantity'];

    // get User details
    public function getUserInfo(){
    	return $this->hasOne('App\User','id','user_id');
    }

    /*Product Details*/

    public function productDetails(){
    	return $this->hasMany('App\Product','id','product_id');
    }

    /*We Can Use belongs to*/ 
    public function productDetails(){
    	return $this->belogsTo('App\Product','proudct_id','id');
    }
}
