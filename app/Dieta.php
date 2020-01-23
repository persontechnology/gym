<?php

namespace gym;

use Illuminate\Database\Eloquent\Model;
use gym\Dietah;
class Dieta extends Model
{
    protected $table='dieta';

    public function historial()
    {
    	return $this->hasMany(Dietah::class);
    }
}
