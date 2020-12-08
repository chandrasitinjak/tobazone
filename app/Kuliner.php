<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kuliner extends Model
{
    public function kabupaten(){
        return $this->belongsTo('App\Kabupaten');
    }
}
