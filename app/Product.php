<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use SoftDeletes;
    
    public function user() {
        return $this->belongsTo('App\User');
    }

    protected $fillable = ['name', 'price', 'stock', 'description', 'category', 'specification', 'image', 'color'];
    protected $dates = ['deleted_at'];
}
	