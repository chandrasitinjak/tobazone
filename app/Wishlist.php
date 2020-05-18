<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Wishlist extends Model
{
    use SoftDeletes;

    protected $dates = ['deleted_at'];
    protected $fillable = ['user_id', 'product_id'];


    public function product() {
        return $this->belongsTo('App\Product', 'product_id');
    }   

    public function customer_info() {
        return $this->belongsTo('App\Profile', 'user_id', 'user_id');
    }

}