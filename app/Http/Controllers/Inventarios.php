<?php

namespace gym\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use gym\Producto;
use Illuminate\Support\Facades\Session;
use gym\Inventario;
use gym\Maquina;
class Inventarios extends Controller
{
    public function index($id)
    {
    	if (Auth::user()->perfil=='Administrador') {
    		$producto=Producto::find($id);
    		return view('inventarios.producto',['producto'=>$producto]);
    	}
    	return view('error');
    }

    public function crear(Request $request)
    {
    	if (Auth::user()->perfil=='Administrador') {
    		$producto=Producto::find($request->input('id'));
    		$inventario=new Inventario;
    		$inventario->cantidadExistente=$request->input('cantidad');
    		$inventario->cantidadActual=$producto->cantidad;
    		$inventario->producto_id=$producto->id;
			$inventario->save();

    		Session::flash('success', ' actualizado exitoso.!');
            return redirect()->route('inventario',['clave'=>$request->input('id')]);
    	}
    	return view('error');
    }

    public function eliminar($id)
    {
    	if (Auth::user()->perfil=='Administrador') {
    		$inventario=Inventario::find($id);
    		try {
    			$inventario->delete();
    			Session::flash('success', ' eliminado exitoso.!');
            
    		} catch (\Exception $e) {
    			Session::flash('info', ' No eliminado inventario.!');
            
    		}

    	return redirect()->route('inventario',['clave'=>$inventario->producto->id]);
    		
    	}
    	return view('error');	
    }


    public function indexMaquina($idM)
    {
        if (Auth::user()->perfil=='Administrador') {
            $maquina=Maquina::find($idM);
            return view('inventarios.maquina',['maquina'=>$maquina]);
        }
        return view('error');
    }

    public function crearMaquinas(Request $request)
    {
        if (Auth::user()->perfil=='Administrador') {
            $maquina=Maquina::find($request->input('id'));
            $inventario=new Inventario;
            $inventario->cantidadExistente=$request->input('cantidad');
            $inventario->cantidadActual=$maquina->cantidad;
            $inventario->maquina_id=$maquina->id;
            $inventario->save();

            Session::flash('success', ' actualizado exitoso.!');
            return redirect()->route('inventarioMaquinas',['clave'=>$request->input('id')]);
        }
        return view('error');
    }

    public function eliminarMaquinas($id)
    {
        if (Auth::user()->perfil=='Administrador') {
            $inventario=Inventario::find($id);
            try {
                $inventario->delete();
                Session::flash('success', ' eliminado exitoso.!');
            
            } catch (\Exception $e) {
                Session::flash('info', ' No eliminado inventario.!');
            
            }

        return redirect()->route('inventarioMaquinas',['clave'=>$inventario->maquina->id]);
            
        }
        return view('error');   
    }
}
