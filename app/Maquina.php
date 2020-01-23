<?php

namespace gym;

use Illuminate\Database\Eloquent\Model;
use gym\Inventario;
use gym\Categoria;
class Maquina extends Model
{
    protected $table="maquina";

    public function inventarios()
    {
    	return $this->hasMany(Inventario::class);
    }

    public function categoria()
    {
        return $this->belongsTo(Categoria::class,'categoria_id');
    }
}
