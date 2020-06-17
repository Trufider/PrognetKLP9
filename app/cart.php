<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class cart extends Model
{
    protected $table='carts';


    public function product()
    {
        return $this->belongsTo('App\product','product_id');
    }
}
