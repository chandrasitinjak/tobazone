<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class KomunitasMember extends Model
{
    protected $table = "komunitas_members";

    protected $primaryKey = 'id';

    protected $fillable = ['member_id','komunitas_id'];
}
