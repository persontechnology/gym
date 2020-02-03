<?php

namespace gym\Http\Controllers;

use gym\Http\Requests\Usuarios\RqActualizar;
use gym\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home');
    }


    public function miperfil()
    {
        $data = array('cliente' => Auth::user() );
        return view('auth.perfil',$data);
    }

    public function actualizarMiperfil(RqActualizar $request)
    {

            $user=User::find($request->input('id'));
            $user->nombre = $request->input('nombre');
            $user->apellido=$request->input('apellido');
            $user->tipo_identificacion=$request->tipo_identificacion;
            $user->identificacion=$request->identificacion;
            $user->telefono=$request->input('telefono');
            $user->direccion=$request->input('direccion');

            $user->save();
            Session::flash('success', $user->nombre.' '.$user->apellido.' actualizado exitoso.!');
            return redirect()->route('miperfil');
    }
}
