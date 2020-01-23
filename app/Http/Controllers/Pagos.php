<?php

namespace gym\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Auth;
use PDF;
use Carbon\Carbon;
use gym\Pago;
use gym\User;
class Pagos extends Controller
{
    
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index($id)
    {
        if (Auth::user()->perfil=="Administrador") {
            $user=User::find($id);
            return view('pagos.index',['clientes'=>$user->pagos,'id'=>$id]);
        }
        return view('error');

    	
    }


    public function crear(Request $request)
    {
        if (Auth::user()->perfil=="Administrador") {
            $fecha=$request->input('fecha');
            $valor=$request->input('valor');

            $request->validate([
                    
                    'fecha' => 'unique:pago,created_at,NULL,id,users_id,'.$request->input('id'),
                    'valor'=>'required',
                ]);

            // 'mtime' => 'unique:your-table-name,mtime,NULL,id,foreign_id,' . $this->input('foreign_id')
            
            $pago=new Pago;
            $pago->created_at=$request->input('fecha');
            $pago->valor=$request->input('valor');
            $pago->users_id=$request->input('id');
            $pago->save();
            Session::flash('success', ' Pago ingresado exitoso.!');
            return redirect()->route('pagos',['clave'=>$request->input('id')]);
        }
        return view('error');

    	
    }	


    public function eliminar($id)
    {
        if (Auth::user()->perfil=="Administrador") {
            
            $pago=Pago::find($id);
            $id=$pago->cliente->id;
            $pago->delete();
            Session::flash('error', 'Pago eliminado exitoso.!');
            return redirect()->route('pagos',['clave'=>$id]);
        }
        return view('error');
    }


    public function imprimir($idVenta)
    {
        if (Auth::user()->perfil=='Administrador') {
            $venta=Pago::find($idVenta);
            if ($venta) {
                $data=array('venta'=>$venta);

                return PDF::loadView('facturas.imprimirPago', $data)
                ->setOptions([
                    'isHtml5ParserEnabled' => true,
                    'isRemoteEnabled' => true,
                    'isJavascriptEnabled'=>true,
                ])
                ->stream($venta->cliente->email);
            }else{
                return view('404');
            }
        }
        return view('error');
    }
}
