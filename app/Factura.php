<?php

namespace gym;
use gym\User;
use Illuminate\Database\Eloquent\Model;
use gym\DetalleFactura;
class Factura extends Model
{
    protected $table='factura';

    public function cliente()
    {
    	 return $this->belongsTo(User::class, 'user_id');
    }

    public function items()
    {
    	return $this->hasMany(DetalleFactura::class);
    }


}
