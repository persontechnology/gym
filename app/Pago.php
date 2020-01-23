<?php

namespace gym;

use Illuminate\Database\Eloquent\Model;
use gym\User;
class Pago extends Model
{
    protected $table='pago';

    public function cliente()
    {
        return $this->belongsTo(User::class,'users_id');
    }
}
