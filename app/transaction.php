<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class transaction extends Model
{
    use softDeletes;

    protected $table = 'transactions';
    
    /**
     * Get the post that owns the comment.
     */
    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function courier()
    {
        return $this->belongsTo('App\courier');
    }

    public function transaction_detail()
    {
        return $this->hasMany('App\transaction_detail');
    }
}
