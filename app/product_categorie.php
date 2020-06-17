<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class product_categorie extends Model
{
     public function product_category_detail()
    {
    	return $this->belongTo('App\product_category_detail');
    }
}
