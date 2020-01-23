<?php

namespace gym\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Auth;
use gym\Asistencia;
use Carbon\Carbon;
use gym\Lista;

use gym\Dieta;
use gym\Dietah;
use gym\User;
use gym\Maquina;
use gym\Producto;

class Consultas extends Controller
{
    public function miAsistencia()
    {
    	return view('consultas.asistencia');
    }

    public function generarAsisetncia(Request $request)
    {
    	$request->validate([
            'cedula' => 'required|digits_between:10,10',
        ]);

    	$cliente=User::where('cedula',$request->input('cedula'))->first();
    	if ($cliente) {

    		$asi=Asistencia::where('created_at',Carbon::today())->first();
            if (!$asi) {
                $asi=new Asistencia;
                $asi->created_at=Carbon::today();
                $asi->save();
            }


            $lista=Lista::where('asistencia_id',$asi->id)->where('users_id',$cliente->id)->first();
            if (!$lista) {
                $lista=new Lista;
                $lista->asistencia_id=$asi->id;
                $lista->users_id=$cliente->id;
                $lista->save();
            }
            
            $request->session()->put('cedulaok', 'true');

            return redirect()->route('miasistenciaLista',['clave'=>$cliente->cedula]);
    	}else{
    		Session::flash('warning','No existe cliente con dicha información.!');
            return redirect()->route('miasistenciaConsulta');
    	}
    }

    public function miasistenciaLista($cedula)
    {
    	
    	$value = Session::get('cedulaok');
    	if ($value=='true') {
    		$cliente=User::where('cedula',$cedula)->first();
	    	if ($cliente) {
	    		Session::forget('cedulaok');
	    		return view('consultas.miasistencias',['cliente'=>$cliente]);
	    	}else{
	    		return view('error');
	    	}
    	}else{
    		Session::forget('cedulaok');
    		return redirect()->route('miasistenciaConsulta');
    	}
    	
    }

    public function miPagos()
    {
        return view('consultas.pagos');
    }

    public function generarMiPagos(Request $request)
    {
        $request->validate([
            'cedula' => 'required|digits_between:10,10',
        ]);

        $cliente=User::where('cedula',$request->input('cedula'))->first();
        if ($cliente) {
            $request->session()->put('cedulaok', 'true');
            return redirect()->route('mipagosLista',['clave'=>$cliente->cedula]);
        }else{
            Session::flash('warning','No existe cliente con dicha información.!');
            return redirect()->route('mipagosConsulta');
        }
    }

    public function mipagosLista($cedula)
    {
        $value = Session::get('cedulaok');
        if ($value=='true') {
            $cliente=User::where('cedula',$cedula)->first();
            if ($cliente) {
                Session::forget('cedulaok');
                return view('consultas.mipagos',['cliente'=>$cliente]);
            }else{
                return view('error');
            }
        }else{
            Session::forget('cedulaok');
            return redirect()->route('mipagosConsulta');
        }
    }


    public function miDietas()
    {
        $data = array('recomendado' => 'no' );
        return view('consultas.dietas',$data);
    }

    public function generarMiDietas(Request $request){

        $request->validate([
            'cedula' => 'required|digits_between:10,10',
        ]);

        $cliente=User::where('cedula',$request->input('cedula'))->first();
        if ($cliente) {

            // calculo de dietas
            $peso=$request->input('peso');
            $altura=$request->input('altura');


            $dieta=Dieta::where('peso',$peso)->where('altura',$altura)->first();
            
            if ($dieta) {
                
                $dietah=Dietah::where('users_id',$cliente->id)->where('dieta_id',$dieta->id)
                ->where('created_at',Carbon::today())->first();
                
                
                if (!$dietah) {
                    $dietah=new Dietah;
                    $dietah->created_at=Carbon::today();
                    $dietah->peso=$peso;
                    $dietah->altura=$altura;
                    $dietah->users_id=$cliente->id;
                    $dietah->dieta_id=$dieta->id;
                    $dietah->save();
                    
                }

                //$request->session()->put('cedulaok', 'true');
                return redirect()->route('miDietaGenerarLista',['clave'=>$cliente->cedula]);

            }else{
                
                Session::flash('warning','No existe información de posibles dietas. las cuales hemos recomendado las siguentes!');

                $otrasdietas=Dieta::all();

                $data = array('recomendado' => 'si','dietas'=>$otrasdietas,'cliente'=>$cliente->id );

                return view('consultas.dietas',$data);
            }

            
        }else{
            Session::flash('warning','No existe cliente con dicha información.!');
            return redirect()->route('midietaConsulta');
        }
    }

    public function generarDietaCliente($idCliente,$idDieta){
        $dietah=Dietah::where('users_id',$idCliente)->where('dieta_id',$idDieta)
                ->where('created_at',Carbon::today())->first();
        $dieta=Dieta::findOrFail($idDieta);
        if (!$dietah) {
            $dietah=new Dietah;
            $dietah->created_at=Carbon::today();
            $dietah->peso=$dieta->peso;
            $dietah->altura=$dieta->altura;
            $dietah->users_id=$idCliente;
            $dietah->dieta_id=$idDieta;
            $dietah->save();
            
            Session::flash('success','Nueva dieta creado exitosa.!');
            return redirect()->route('midietaConsulta');
        }else{
            Session::flash('warning','Ya registro una dieta hoy, con esta informacion!');
            return redirect()->route('midietaConsulta');
        }
    }

    public function miDietaGenerarLista($cedula){
        $cliente=User::where('cedula',$cedula)->first();
        $listaDieta=Dietah::where('users_id',$cliente->id)->orderBy('created_at','desc')->get();
        $data = array('dietas' => $listaDieta );
        return view('consultas.misdietas',$data);
    }




    public function catalogoProducto(){
         $maquinas=Producto::all();
            $data=array('maquinas'=>$maquinas);
        return view('consultas.catalogoProducto',$data);
    }

    public function CatalogoMaquina(){
         $maquinas=Maquina::all();
            $data=array('maquinas'=>$maquinas);
        return view('consultas.catalogoMaquina',$data);
    }

  

}
