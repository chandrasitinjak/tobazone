<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    public function product() {
        return $this->belongsTo('App\Product');
    }

    public function creator() {
        return $this->belongsTo('App\User');
    }
}
 