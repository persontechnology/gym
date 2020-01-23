<?php

namespace gym\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Auth;
use Illuminate\Support\Facades\Storage;
use gym\Maquina;
use gym\Categoria;
class Maquinas extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        if (Auth::user()->perfil=="Administrador") {
            $maquinas=Maquina::all();
            $data=array('maquinas'=>$maquinas);
            return view('maquinas.index',$data);
        }
        return view('error');
    }


    public function nuevo()
    {
        if (Auth::user()->perfil=="Administrador") {

            return view('maquinas.nuevo',['categorias'=>Categoria::all()]);
        }
        return view('error');
    }

    public function guardar(Request $request)
    {

        if (Auth::user()->perfil=="Administrador") {
        	$request->validate([
                'cat'=>'required',
                'nombre' => 'required|max:255|unique:maquina,nombre',
                'cantidad'=>'required',
                'marca'=>'required',
                'foto'=>'nullable|mimes:jpeg,jpg,png',
                'observacion'=>'nullable',
            ]);

        	$maquina=new Maquina;
    		$maquina->categoria_id=$request->input('cat');
            $maquina->nombre = $request->input('nombre');
            $maquina->cantidad = $request->input('cantidad');
            $maquina->marca = $request->input('marca');
            $maquina->observacion=$request->input('observacion');

            if ($request->hasFile('foto')) {
                Storage::putFile('public/images/maquinas', $request->file('foto'));
                $maquina->foto=$request->foto->hashName();    
            }
            

            $maquina->save();
            Session::flash('success', $maquina->nombre.' ingresado exitoso.!');
            return redirect()->route('maquinas');

        }
        return view('error');

    }


    public function editar($id)
    {
        if (Auth::user()->perfil=="Administrador") {
            
            return view('maquinas.editar',['maquina'=>Maquina::find($id),'categorias'=>Categoria::all()]);
        }
        return view('error');
    }

    public function actualizar(Request $request)
    {
        if (Auth::user()->perfil=="Administrador") {
            
            $request->validate([
                'cat'=>'required',
                'nombre' => 'required|max:255|unique:maquina,nombre,'.$request->input('id'),
                'cantidad'=>'required',
                'marca'=>'required',
                'foto'=>'nullable|mimes:jpeg,jpg,png',
                'observacion'=>'nullable',
            ]);

        	$maquina=Maquina::find($request->input('id'));
    		$maquina->categoria_id=$request->input('cat');
            $maquina->nombre = $request->input('nombre');
            $maquina->cantidad = $request->input('cantidad');
            $maquina->marca = $request->input('marca');
            $maquina->observacion=$request->input('observacion');
            $maquina->estado=$request->input('estado');

            if ($request->hasFile('foto')) {
	            if ($maquina->foto) {
	                if (Storage::exists('public/images/maquinas/'.$maquina->foto)) {
	                    Storage::delete('public/images/maquinas/'.$maquina->foto);
	                }
	            }
	            
	            Storage::putFile('public/images/maquinas', $request->file('foto'));
	            $maquina->foto=$request->foto->hashName();    
	        }
            
            $maquina->save();
            Session::flash('success', $maquina->nombre.' actualizado exitoso.!');
            return redirect()->route('maquinas');
            
        }
        return view('error');
    }

    public function eliminar($idCl)
    {
        if (Auth::user()->perfil=="Administrador") {
            Maquina::destroy($idCl);
            Session::flash('error', 'Maquina eliminado exitoso.!');
            return redirect()->route('maquinas');
        }
        return view('error');
    }
}
