<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kabupaten extends Model
{
    protected $table="kabupatens";

    protected $primaryKey = "id_kabupaten";

    public function getPaketWisata(){
        return $this->hasMany(paketWisata::class,'kabupaten_id','id_kabupaten');
    }

    public function getKomunitas(){
        return $this->hasMany(Komunitas::class,'kabupaten_id','id_kabupaten');
    }

    public function getLayananWisata(){
        return $this->hasMany(LayananWisata::class,'kabupaten_id','id_kabupaten');
    }
}
