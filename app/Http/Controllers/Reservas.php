<?php

namespace gym\Http\Controllers;

use gym\Reserva;
use gym\Rutina;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class Reservas extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index($rutina)
    {
        if (Auth::user()->perfil=="Administrador") {
            $rutina=Rutina::findOrFail($rutina);
            $data = array('reservas' => $rutina->reservas );
            return view('reservas.index',$data);
        }
        return view('error');
    	
    }

    public function eliminar($id)
    {
        if (Auth::user()->perfil=="Administrador") {
            
            $re=Reserva::findOrFail($id);
            $rutina=$re->rutina->id;
            $re->delete();
            Session::flash('error', 'Reserva eliminado exitoso.!');
            return redirect()->route('reservas',$rutina);
        }
        return view('error'); 
    }
}
