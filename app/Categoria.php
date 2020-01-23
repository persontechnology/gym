<?php

namespace gym;

use Illuminate\Database\Eloquent\Model;
use gym\Producto;
class Categoria extends Model
{
    protected $table='categoria';

    public function productos()
    {
    	return $this->hasMany(Producto::class);
    }
}
