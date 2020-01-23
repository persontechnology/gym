<?php

namespace gym;

use Illuminate\Database\Eloquent\Model;
use gym\Producto;
use gym\Maquina;

class Inventario extends Model
{
    protected $table='inventario';


    public function producto()
    {
        return $this->belongsTo(Producto::class,'producto_id');
    }

    public function maquina()
    {
        return $this->belongsTo(Maquina::class,'maquina_id');
    }
}
