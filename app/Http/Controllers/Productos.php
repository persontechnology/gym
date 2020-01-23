<?php

namespace gym\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Auth;
use Illuminate\Support\Facades\Storage;
use gym\Producto;
use gym\Categoria;
class Productos extends Controller
{
 

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        if (Auth::user()->perfil=="Administrador") {
            $productos=Producto::all();
            $data=array('productos'=>$productos);
            return view('productos.index',$data);
        }
        return view('error');
    	
    }


    public function nuevo()
    {
        if (Auth::user()->perfil=="Administrador") {
            return view('productos.nuevo',['categorias'=>Categoria::all()]);
        }
        return view('error');
    }

    public function guardar(Request $request)
    {

        if (Auth::user()->perfil=="Administrador") {
            $Decimal = "/^[0-9,]+(\.\d{0,2})?$/";

        	$request->validate([
                'cat'=>'required',
                'nombre' => 'required|max:255|unique:producto,nombre',
                'cantidad'=>'required|regex:'.$Decimal,
                'precioCompra'=>'required|regex:'.$Decimal,
                'precioVenta'=>'required|regex:'.$Decimal,
                'proveedor'=>'required',
                'foto'=>'nullable|mimes:jpeg,jpg,png',
                'descripcion'=>'nullable',
            ]);

        	$producto=new Producto;
    		$producto->categoria_id = $request->input('cat');
            $producto->nombre = $request->input('nombre');
            $producto->cantidad = $request->input('cantidad');
            $producto->precioCompra = $request->input('precioCompra');
            $producto->precioVenta = $request->input('precioVenta');
            $producto->proveedor = $request->input('proveedor');

            $producto->descripcion=$request->input('descripcion');

            if ($request->hasFile('foto')) {
                Storage::putFile('public/images/productos', $request->file('foto'));
                $producto->foto=$request->foto->hashName();    
            }
            

            $producto->save();
            Session::flash('success', $producto->nombre.' ingresado exitoso.!');
            return redirect()->route('productos');

        }
        return view('error');

    }


    public function editar($id)
    {
        if (Auth::user()->perfil=="Administrador") {
            
            return view('productos.editar',['producto'=>Producto::find($id),'categorias'=>Categoria::all()]);
        }
        return view('error');
    }

    public function actualizar(Request $request)
    {
        if (Auth::user()->perfil=="Administrador") {
            $Decimal = "/^[0-9,]+(\.\d{0,2})?$/";
            $request->validate([
                
                'cat'=>'required',
                'nombre' => 'required|max:255|unique:producto,nombre,'.$request->input('id'),
                'cantidad'=>'required|regex:'.$Decimal,
                'precioCompra'=>'required|regex:'.$Decimal,
                'precioVenta'=>'required|regex:'.$Decimal,
                'proveedor'=>'required',
                'foto'=>'nullable|mimes:jpeg,jpg,png',
                'descripcion'=>'nullable',


            ]);

        	$producto=Producto::find($request->input('id'));
    		$producto->categoria_id = $request->input('cat');
            $producto->nombre = $request->input('nombre');
            $producto->cantidad = $request->input('cantidad');
            $producto->precioCompra = $request->input('precioCompra');
            $producto->precioVenta = $request->input('precioVenta');
            $producto->proveedor = $request->input('proveedor');

            $producto->descripcion=$request->input('descripcion');

            if ($request->hasFile('foto')) {
	            if ($producto->foto) {
	                if (Storage::exists('public/images/productos/'.$producto->foto)) {
	                    Storage::delete('public/images/productos/'.$producto->foto);
	                }
	            }
	            
	            Storage::putFile('public/images/productos', $request->file('foto'));
	            $producto->foto=$request->foto->hashName();    
	        }
            

            $producto->save();
            Session::flash('success', $producto->nombre.' actualizado exitoso.!');
            return redirect()->route('productos');
            
        }
        return view('error');
    }

    public function eliminar($idCl)
    {
        if (Auth::user()->perfil=="Administrador") {
            Producto::destroy($idCl);
            Session::flash('error', 'Producto eliminado exitoso.!');
            return redirect()->route('productos');
        }
        return view('error');
    }
}
