<?php

namespace gym;

use Illuminate\Database\Eloquent\Model;

use gym\Factura;
use gym\Producto;
use gym\Pago;

class DetalleFactura extends Model
{
    protected $table="detallaFactura";

    public function venta()
    {
        return $this->belongsTo(Factura::class,'factura_id');
    }

    public function producto()
    {
        return $this->belongsTo(Producto::class,'producto_id');
    }

	public function pago()
    {
        return $this->belongsTo(Pago::class,'pago_id');
    }    

}
