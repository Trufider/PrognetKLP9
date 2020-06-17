<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class courier extends Model
{

    use SoftDeletes;

    protected $tables = 'couriers';
    
    public function transaction(){
        return $this->hasMany('App\transaction');
    }
}
