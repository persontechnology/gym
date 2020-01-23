<?php

namespace gym;

use Illuminate\Database\Eloquent\Model;
use gym\Asistencia;
use gym\User;

class Lista extends Model
{
    protected $table="lista";

    public function asistencia()
    {
        return $this->belongsTo(Asistencia::class,'asistencia_id');
    }

    public function clientes()
    {
        return $this->belongsTo(User::class,'users_id');
    }



}
