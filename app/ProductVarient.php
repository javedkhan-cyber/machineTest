<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductVarient extends Model
{
    protected $table = 'product_varients';
    protected $fillable = ['product_id','size_large','size_medium','size_xl','size_xxl'];
}
