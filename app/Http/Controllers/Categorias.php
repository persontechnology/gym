<?php

namespace gym\Http\Controllers;

use Illuminate\Http\Request;
use gym\Categoria;
use Auth;
use Illuminate\Support\Facades\Session;
class Categorias extends Controller
{
	public function __construct()
    {
        $this->middleware('auth');
    }


    public function index()
    {
        if (Auth::user()->perfil=="Administrador") {
            $categorias=Categoria::all();
            $data=array('categorias'=>$categorias);
            return view('categorias.index',$data);
        }
        return view('error');
    }

    public function nuevo()
    {
    	if (Auth::user()->perfil=="Administrador") {
            
            return view('categorias.nuevo');
        }
        return view('error');
    }

    public function guardar(Request $request)
    {
        $rg_letras='/^[\pL\s\-]+$/u';
    	if (Auth::user()->perfil=="Administrador") {
            
            $request->validate([
                
                'nombre' => 'required|max:255|unique:categoria,nombre|regex:'.$rg_letras,
                'observacion'=>'nullable',
            ]);

            $cat=new Categoria;
            $cat->nombre=$request->input('nombre');
            $cat->descripcion=$request->input('observacion');
            $cat->save();
            Session::flash('success', $cat->nombre.' ingresado exitoso.!');
            return redirect()->route('categorias');
        }
        return view('error');
    }


    public function editar($id)
    {
    	if (Auth::user()->perfil=="Administrador") {
            $cat=Categoria::find($id);
            return view('categorias.editar',['cat'=>$cat]);
        }
        return view('error');
    }

    public function actualizar(Request $request)
    {
        $rg_letras='/^[\pL\s\-]+$/u';
    	if (Auth::user()->perfil=="Administrador") {
            
            $request->validate([
                
                'nombre' => 'required|max:255|unique:categoria,nombre,'.$request->input('id'),'|regex:'.$rg_letras,
                'observacion'=>'nullable',
            ]);

            $cat=Categoria::find($request->input('id'));
            $cat->nombre=$request->input('nombre');
            $cat->descripcion=$request->input('observacion');
            $cat->save();
            Session::flash('success', $cat->nombre.' actualizado exitoso.!');
            return redirect()->route('categorias');
        }
        return view('error');
    }

    public function eliminar($id)
    {
    	if (Auth::user()->perfil=="Administrador") {
            Categoria::destroy($id);
            Session::flash('success', 'Categoria eliminado exitoso.!');
            return redirect()->route('categorias');
        }
        return view('error');
    }
}
