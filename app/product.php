<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class product extends Model
{
    use SoftDeletes;

    protected $table = 'products';

    protected $dates = ['deleted_at'];

    public function product_image()
    {
        return $this->hasMany('App\product_image');
    }

    public function transaction_detail()
    {
        return $this->hasMany('App\transaction_detail');
    }

	
    
    public function product_category_detail()
    {
    	return $this->belongTo('App\product_category_detail');
    }
	public function discount()
    {
    	return $this->hasMany('App\discount');
    }
     
}
