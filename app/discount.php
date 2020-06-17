<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class discount extends Model
{



   public function product()
    {
    	return $this->hasOne('App\product','id','product_id');
    }
}
