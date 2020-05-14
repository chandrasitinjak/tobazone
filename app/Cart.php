<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Cart extends Model 
{
    use SoftDeletes;

    protected $dates = ['deleted_at'];

    public function product() {
        return $this->belongsTo('App\Product');
    }

    public function buyer() {
        return $this->belongsTo('App\User', 'user_id');
    }
}
 