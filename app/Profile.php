<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    protected $table = 'profiles';
    protected $fillable = ['name', 'address', 'phone', 'photo', 'gender', 'birthday'];

    public function user() {
        return $this->belongsTo('App\User');
    }
}
