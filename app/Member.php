<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    protected $table = "member";

    protected $primaryKey = 'id';

    protected $fillable = ['user_id','photo','no_KTP'];

    public function getUser(){
        return $this->belongsTo(User::class,'user_id','id');
    }

    public function getLayanan(){
        return $this->hasMany(LayananWisata::class,'member_id','id');
    }

    public function getKomunitasMember(){
        return $this->belongsToMany(Komunitas::class,'komunitas_members','member_id','komunitas_id','id');
    }

    public function defineStatus($src){
        $status=null;
        if($src==1){
            $status = 'Aktif';
        }else if($src==2){
            $status = 'Non-Aktif';
        }else if($src==0){
            $status = 'Request';
        }else if($src==4){
            $status = 'Ditolak';
        }
        return $status;
    }
    public static function boot() {
        parent::boot();

        static::deleting(function($member) { // before delete() method call this
            $member->getKomunitasMember()->detach();
            // do the rest of the cleanup...
        });
    }
}
