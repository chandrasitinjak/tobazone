<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rekening extends Model
{
    protected $table = 'rekenings';

    protected $primaryKey = 'id_rekening';

    protected $fillable = ['nama_bank','nomor_rekening','gambar'];

    public function getTransaksi(){
        return $this->hasMany(Transaksi::class,'rekening_id','id_rekening');
    }
}
