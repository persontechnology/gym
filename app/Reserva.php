<?php

namespace gym;

use Illuminate\Database\Eloquent\Model;

class Reserva extends Model
{
    public function rutina()
    {
        return $this->belongsTo(Rutina::class);
    }
}
