<?php

namespace gym;

use Illuminate\Database\Eloquent\Model;
use gym\Lista;
class Asistencia extends Model
{
    protected $table='asistencia';

    public function listado()
    {
    	return $this->hasMany(Lista::class);
    }
}
