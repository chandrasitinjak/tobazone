<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail as MustVerifyEmailContract;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Spatie\Permission\Traits\HasRoles;
use App\Notifications\EmailRegistration;


class User extends Authenticatable implements MustVerifyEmailContract
{
    use Notifiable, HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'username', 'email', 'password', 'status', 'name', 'no_WA', 'no_HP', 'status','email_verified_at'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function profile() {
        return $this->hasOne('App\Profile');
    }

    public function products() {
        return $this->hasMany('App\Product');
    }

    public function transactions() {
        return $this->hasMany('App\Transaction');
    }

    public function getPemesanan(){
        return $this->hasMany(Pemesanan::class,'user_id','id');
    }

    public function sendEmailVerificationNotification() {
        $this->notify(new EmailRegistration);
    }
}
