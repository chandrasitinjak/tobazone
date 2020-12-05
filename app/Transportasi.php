<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transportasi extends Model
{
    public function kabupaten(){
        return $this->belongsTo('App\Kabupaten');
    }
}
