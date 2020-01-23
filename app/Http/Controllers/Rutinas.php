<?php

namespace gym\Http\Controllers;

use gym\Rutina;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class Rutinas extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }


    public function index()
    {
        if (Auth::user()->perfil=="Administrador") {
            $rutinas=Rutina::all();
            $data=array('rutinas'=>$rutinas);
            return view('rutinas.index',$data);
        }
        return view('error');
    	
    }


    public function nuevo( Request $request)
    {
        
    	return view('rutinas.nuevo');
    }

    public function guardar(Request $request)
    {
        $rg_letras='/^[\pL\s\-]+$/u';
        if (Auth::user()->perfil=="Administrador") {
            $request->validate([
                'nombre' => 'required|max:255|unique:rutinas,nombre|regex:'.$rg_letras,
                'descripcion'=>'required|max:255',
                'horaInicio'=>'required',
                'horaFin'=>'required',
                'dias'=>'required'
            ]);
            
            $rutina=new Rutina();
            $rutina->nombre=$request->nombre;
            $rutina->inicio=$request->horaInicio;
            $rutina->fin=$request->horaFin;
            $rutina->dias=$request->dias;
            $rutina->descripcion=$request->descripcion;
            $rutina->save();
            Session::flash('success', $rutina->nombre.' ingresado exitoso.!');
            return redirect()->route('rutinas');
        }
        return view('error');
    }


    public function editar($id)
    {
        

        if (Auth::user()->perfil=="Administrador") {
            $rutina=Rutina::findOrFail($id);
            return view('rutinas.editar',['rutina'=>$rutina]);
        }
        return view('error');

    }


    public function actualizar(Request $request)
    {
        $rg_letras='/^[\pL\s\-]+$/u';
        if (Auth::user()->perfil=="Administrador") {
            $request->validate([
                'id'=>'required',
                'nombre' => 'required|max:255|unique:rutinas,nombre,'.$request->id.'|regex:'.$rg_letras,
                'descripcion'=>'required|max:255',
                'horaInicio'=>'required',
                'horaFin'=>'required',
                'dias'=>'required',
                'estado'=>'required|in:1,0'
            ]);

            $rutina=Rutina::findOrFail($request->id);
            $rutina->nombre=$request->nombre;
            $rutina->inicio=$request->horaInicio;
            $rutina->fin=$request->horaFin;
            $rutina->dias=$request->dias;
            $rutina->descripcion=$request->descripcion;
            $rutina->estado=$request->estado;
            $rutina->save();
            Session::flash('success', $rutina->nombre.' actualizado exitoso.!');
            return redirect()->route('rutinas');
        }
        return view('error');
    }

    public function eliminar($id)
    {
        if (Auth::user()->perfil=="Administrador") {
            Rutina::destroy($id);
            Session::flash('error', 'Rutina eliminado exitoso.!');
            return redirect()->route('rutinas');
        }
        return view('error'); 
    }

}
