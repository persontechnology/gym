<?php

namespace gym\Http\Controllers;

use Illuminate\Http\Request;
use gym\Factura;
use gym\DetalleFactura;
use Illuminate\Support\Facades\Session;
use Auth;
use gym\User;
use gym\Producto;
use PDF;
use gym\Pago;

class Facturas extends Controller
{

        // factura
        // estado
        // total
        // user_id


    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        if (Auth::user()->perfil=="Administrador") {

            $data=array('facturas'=>Factura::get());
            return view('facturas.index',$data);
        }
        return view('error');
    	
    }

    public function nuevo()
    {
        if (Auth::user()->perfil=="Administrador") {
            
            $data=array(
                'productos'=>Producto::all(),
                'clientes'=>User::all()
            );

            return view('facturas.nuevo',$data);
        }
        return view('error');
        
    }

    public function finalizar(Request $request)
    {
        if (Auth::user()->perfil=="Administrador") {
          
            $idsProductos=$request->input('idproductosventa');
            $cantidadesProductos=$request->input('cantidadesventa');

            

            $venta=new Factura;
            $venta->factura=$request->input('numeroFactura');
            $venta->user_id=$request->input('cliente');
            $venta->save();
            
            $i=0;
            $venta->total=0;
            foreach ($idsProductos as $pro) {

                $detalleFactura=new DetalleFactura;
                
                if ($pro=="pago") {
                    $mes=$cantidadesProductos[$i];
                    $pago=Pago::where('fecha',$mes)->where('users_id',$request->input('cliente'))->first();

                    if (!$pago) {
                        $preciopagos=$request->input('preciopagos');
                        $pago=new Pago;
                        $pago->fecha=$mes;
                        $pago->valor=$preciopagos[$i];
                        $pago->users_id=$request->input('cliente');
                        $pago->save();

                        $detalleFactura->cantidad=1;
                        $detalleFactura->precio=$preciopagos[$i];
                        $detalleFactura->pago_id=$pago->id;
                        $venta->total=$venta->total+$preciopagos[$i];

                    }else{
                         Session::flash('error', 'No se genero la factura al cliente, porque ya existe.!');
                    }

                    

                }else{
                    $producto=Producto::find($pro);
                    $detalleFactura->cantidad=$cantidadesProductos[$i];
                    $detalleFactura->precio=$producto->precioVenta;
                    $detalleFactura->producto_id=$pro;
                    $producto->cantidad=$producto->cantidad-$cantidadesProductos[$i];
                    $producto->save();

                    $venta->total=$venta->total+($producto->precioVenta*$cantidadesProductos[$i]);
                }


                
                $detalleFactura->factura_id=$venta->id;
                $detalleFactura->save();
                $venta->save();

                $i++;

            }

            $data=array('mensajeVentaOk'=>'Nueva venta realizada exitosa','idVenta'=>$venta->id);
            Session::flash('ventaok', $data);
            return redirect()->route('nuevoFactura');
        }
        return view('error');
    }


    public function imprimir($idVenta)
    {
        if (Auth::user()->perfil=='Administrador') {
            $venta=Factura::find($idVenta);
            if ($venta) {
                $data=array('venta'=>$venta);

                return PDF::loadView('facturas.imprimirFactura', $data)
                ->setOptions([
                    'isHtml5ParserEnabled' => true,
                    'isRemoteEnabled' => true,
                    'isJavascriptEnabled'=>true,
                ])
                ->stream($venta->factura);
            }else{
                return view('404');
            }
        }
        return view('error');
    }


    public function eliminar($id)
    {
        if (Auth::user()->perfil=='Administrador') {
                try {
                    Factura::destroy($id);
                    
                    Session::flash('error', 'Factura eliminado exitoso.!');
                    return redirect()->route('facturas');

                } catch (\Exception $e) {
                    return view('error');
                }
        }
        return view('error');
    }


    public function obtenerPagos(Request $request){

        $pago=Pago::where('users_id',$request->input('id'))->select('fecha')->get();
        return response()->json(['res'=>$pago]);
    }
}
