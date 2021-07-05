<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    
    protected $table = 'products';
    protected $fillable = ['product_name','product_sale','sale_price'];


    // Relation for getting images
    public function getImages(){
    	return $this->hasMany('App\ProductImage','product_id','id');
    }

    /*Relation for getting varient examples*/

    public function getVarient(){
    	return $this->hasOne('App\ProductVarient','product_id','id');
    }
}
