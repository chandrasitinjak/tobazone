<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    protected $table = 'transaksi';

    protected $primaryKey = 'id_transaksi';

    protected $fillable = ['pemesanan_id','rekening_id','jumlah','gambar'];

    public function getPemesanan(){
        return $this->belongsTo(Pemesanan::class,'pemesanan_id','id_pemesanan');
    }

    public function getRekening(){
        return $this->belongsTo(Rekening::class,'rekening_id','id_rekening');
    }
}
