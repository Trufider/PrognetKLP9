<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class product_review extends Model
{
    protected $table = 'product_reviews';

    public function product()
    {
        return $this->belongsTo('App\product');
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function response()
    {
        return $this->hasOne('App\response','review_id');
    }
}
