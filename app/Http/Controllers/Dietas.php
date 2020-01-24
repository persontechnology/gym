<?php

namespace gym\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Auth;
use gym\Dieta;

use gym\Dietah;
use gym\Notifications\NoticarDieta;
use gym\User;
use Illuminate\Support\Facades\Notification;

class Dietas extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

	public function index()
	{
		if (Auth::user()->perfil=="Administrador") {
	        $data = array('dietas' => Dieta::all());
	        return view('dietas.index',$data);
	    }
	    return view('error');
	}

	public function nuevo()
	{
		if (Auth::user()->perfil=="Administrador") {
	        return view('dietas.nuevo');
	    }
	    return view('error');
	}

	public function guardar(Request $request)
	{
		$rg_letras='/^[\pL\s\-]+$/u';
		if (Auth::user()->perfil=="Administrador") {
	        $request->validate([
                'titulo' => 'required|max:255|unique:dieta,titulo|regex:'.$rg_letras,
                'peso'=>'required',
                'altura'=>'required',
                'detalle'=>'required',
                
            ]);

	        $dieta=new Dieta;
	        $dieta->titulo=$request->input('titulo');
	        $dieta->peso=$request->input('peso');
	        $dieta->altura=$request->input('altura');
	        $dieta->detalle=$request->input('detalle');

			$dieta->save();
			
			$users=User::all();
			Notification::send($users, new NoticarDieta($dieta));

            Session::flash('success', $dieta->titulo.' ingresado exitoso.!');
            return redirect()->route('dietas');
	    }
	    return view('error');
	}

	public function editar($id)
	{
		if (Auth::user()->perfil=="Administrador") {
	        $data = array('dieta' => Dieta::find($id));
	        return view('dietas.editar',$data);
	    }
	    return view('error');
	}

	public function actualizar(Request $request)
	{
		$rg_letras='/^[\pL\s\-]+$/u';
		if (Auth::user()->perfil=="Administrador") {
	        $request->validate([
	        	'id',
                'titulo' => 'required|max:255|unique:dieta,titulo,'.$request->input('id').'|regex:'.$rg_letras,
                'peso'=>'required',
                'altura'=>'required',
                'detalle'=>'required',
                
            ]);

	        $dieta= Dieta::find($request->input('id'));
	        $dieta->titulo=$request->input('titulo');
	        $dieta->peso=$request->input('peso');
	        $dieta->altura=$request->input('altura');
	        $dieta->detalle=$request->input('detalle');
	        $dieta->save();
            Session::flash('success', $dieta->titulo.' actualizado exitoso.!');
            return redirect()->route('dietas');
	    }
	    return view('error');
	}

	public function eliminar($id)
	{
		if (Auth::user()->perfil=="Administrador") {
	        Dieta::destroy($id);
            Session::flash('success', 'Dieta eliminado exitoso.!');
            return redirect()->route('dietas');
	    }
	    return view('error');
	}

	public function historial($id)
	{
		if (Auth::user()->perfil=="Administrador") {
			$dieta=Dieta::find($id);
	        return view('dietas.historial',['dieta'=>$dieta]);
	    }
	    return view('error');
	}
	

	public function dietasEliminarHistorial($id){
		if (Auth::user()->perfil=="Administrador") {
	        Dietah::destroy($id);
            Session::flash('success', 'Dieta historial eliminado exitoso.!');
            return redirect()->route('dietas');
	    }
	    return view('error');
	}    

	public function dietasClienteHistorial($id){
		$dietas=Dietah::where('users_id',$id)->get();
		return view('dietas.historialCliente',['dietas'=>$dietas]);


	}
}
