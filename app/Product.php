<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public function user() {
        return $this->belongsTo('App\User');
    }

    protected $fillable = ['name', 'price', 'stock', 'description', 'specification', 'image', 'color'];
}
	