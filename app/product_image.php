<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class product_image extends Model
{
    public function product()
    {
        return $this->belongsTo('App\product');
    
 
    	return $this->hasOne('App\product','id','product_id');
    }
}
