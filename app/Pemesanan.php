<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pemesanan extends Model
{
    protected $table = 'pemesanan';

    protected $primaryKey = 'id_pemesanan';

    protected $fillable=['user_id','sesi_id','status','pesan','jumlah_peserta'];

    public function getSesi(){
        return $this->belongsTo(Sesi::class,'sesi_id','id_sesi');
    }

    public function getUser(){
        return $this->belongsTo(User::class,'user_id','id');
    }

    public function getTransaksi(){
        return $this->hasMany(Transaksi::class,'pemesanan_id','id_pemesanan');
    }

    public function defineStatus($src){
        $status=null;
        if($src==0){
            $status = 'Pesanan Dibatalkan';
        }else if($src==1){
            $status = 'Menunggu Pembayaran';
        }else if($src==2){
            $status = 'Menunggu Konfirmasi Pembayaran dari Pengelola Paket';
        }else if($src==3){
            $status = 'Pemesanan Telah Berhasil';
        }else if($src==4){
            $status = 'Pemesanan Telah Selesai/Berakhir';
        }else if($src==5){
            $status = 'Pesanan dibatalkan, Waktu Pembayaran Anda Telah Berakhir';
        }else if($src==6){
            $status = 'Bukti Pembayaran Ditolak';
        }
        return $status;
    }
}
