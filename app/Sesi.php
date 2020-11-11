<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sesi extends Model
{
    protected $table = 'sesis';
    protected $primaryKey = 'id_sesi';
    protected $fillable =['paket_id','kuota_peserta','jadwal','status'];

    public function getPaket(){
        return $this->belongsTo(paketWisata::class,'paket_id','id_paket');
    }

    public function getPemesanan(){
        return $this->hasMany(Pemesanan::class,'sesi_id','id_sesi');
    }

    public function defineStatus($status){
        if($status == 1){
            return "Aktif";
        }
        return "Non-Aktif";
    }
}
