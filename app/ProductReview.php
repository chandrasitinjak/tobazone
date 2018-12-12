<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductReview extends Model
{
    protected $fillable = ['transaction_id', 'user_id', 'product_id', 'body'];

    public function product() {
        return $this->belongsTo('App\Product', 'product_id');
    }

    public function customer() {
        return $this->belongsTo('App\User', 'user_id');
    }
}
