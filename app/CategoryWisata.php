<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CategoryWisata extends Model
{
    protected $table = 'category_wisatas';
    public function objekWisata(){
        return $this->belongsTo('App\ObjekWisata');
    }
}
