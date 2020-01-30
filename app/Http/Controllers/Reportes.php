<?php

namespace gym\Http\Controllers;

use Carbon\Carbon;
use gym\Dietah;
use gym\User;
use Illuminate\Http\Request;

class Reportes extends Controller
{
    public function estaditicasDias($idUser)
    {
        $anio=Carbon::now();
       $user=User::findOrFail($idUser);
       $dietas=Dietah::where('users_id',$user->id)->orderBy('created_at','asc')->get();
       $data = array('user' => $user,'dietas'=>$dietas );
       return view('reportes.reporte',$data);
    }
    
}
