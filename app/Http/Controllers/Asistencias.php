<?php

namespace gym\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Auth;
use gym\Asistencia;
use Carbon\Carbon;
use gym\Lista;
use gym\User;

class Asistencias extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        if (Auth::user()->perfil=="Administrador") {

           return view('asistencias.index',['asistencias'=>Asistencia::all()]);
        }
        return view('error');
    	
    }


    public function nuevo()
    {
        if (Auth::user()->perfil=="Administrador") {
            $asi=Asistencia::where('created_at',Carbon::today())->first();
            if (!$asi) {
                $asi=new Asistencia;
                $asi->created_at=Carbon::today();
                $asi->save();

            }

            $clientes=User::where('id','!=',Auth::id())->get();
            $data=array();

            foreach ($clientes as $cli) {
                $lista=Lista::where('asistencia_id',$asi->id)->where('users_id',$cli->id)->first();
                if (!$lista) {
                    $lista=new Lista;
                    $lista->asistencia_id=$asi->id;
                    $lista->users_id=$cli->id;
                    $lista->save();
                    
                }
                array_push($data, $lista);
            }

            return view('asistencias.nuevo',['lista'=>$data]);



        }
        return view('error');
        
    }

    public function cambiar(Request $request)
    {
        $id=$request->input('id');
        $Lista=Lista::find($id);
        if ($Lista->estado) {
            $Lista->estado=false;
        }else{
            $Lista->estado=true;
        }
        $Lista->save();

        return response()->json(['estado'=>$Lista->estado]);
    }

    public function eliminar($id)
    {
        if (Auth::user()->perfil=="Administrador") {
            Asistencia::destroy($id);
            Session::flash('error', 'Asistencia eliminado exitoso.!');
            return redirect()->route('asistencias');
        }
        return view('error');
    }

    public function listado($id)
    {
        if (Auth::user()->perfil=="Administrador") {
            return view('asistencias.listado',['lista'=>Asistencia::find($id)]);
        }
        return view('error');
    }


}
