<?php

namespace gym;

use Illuminate\Database\Eloquent\Model;
use gym\Dieta;
use gym\User;
class Dietah extends Model
{
    protected $table='dietah';

    public function dieta()
    {
        return $this->belongsTo(Dieta::class,'dieta_id');
    }

    public function cliente()
    {
        return $this->belongsTo(User::class,'users_id');
    }
}
