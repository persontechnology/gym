<?php

namespace gym;
use gym\Inventario;
use Illuminate\Database\Eloquent\Model;
use gym\Categoria;
class Producto extends Model
{
    protected $table="producto";


    public function inventarios()
    {
    	return $this->hasMany(Inventario::class);
    }

     public function categoria()
    {
        return $this->belongsTo(Categoria::class,'categoria_id');
    }
}
