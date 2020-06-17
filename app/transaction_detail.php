<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class transaction_detail extends Model
{
    protected $table = 'transaction_details';

    public function transaction(){
        return $this->belongsToMany('App\transaction');
    }

    public function product()
    {
        return $this->belongsTo('App\product','product_id');
    }
}
