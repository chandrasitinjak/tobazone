<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = ['transaction_id', 'product_id', 'price', 'quantity'];

    public function product() {
        return $this->belongsTo('App\Product')->withTrashed();
    }

    public function transaction() {
        return $this->belongsTo('App\Transaction');
    }

}
