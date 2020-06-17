<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class product_category_detail extends Model
{
     public function product()
    {
    	return $this->hasOne('App\product','id','product_id');
    }

     public function product_categorie()
    {
    	return $this->hasOne('App\product_categorie','id','product__category_id');
    }
}
