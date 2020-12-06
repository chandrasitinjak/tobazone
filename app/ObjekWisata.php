<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ObjekWisata extends Model
{
    public function kabupaten(){
        return $this->belongsTo('App\Kabupaten');
    }
    public function categoryWisata(){
        return $this->hasMany('App\CategoryWisata');
    }
}
