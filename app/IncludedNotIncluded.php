<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class IncludedNotIncluded extends Model
{
    protected $table = 'included_not_included';
    protected $fillable = ['jenis_ini','keterangan','paket_wisata_id'];
    protected $primaryKey = 'id_ini';

    public function getPaketWisata(){
        return $this->belongsTo(paketWisata::class,'paket_wisata_id','id_ini');
    }
}
