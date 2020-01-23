<?php

namespace gym\Http\Controllers\Movil;

use Illuminate\Http\Request;
use gym\Http\Controllers\Controller;
use gym\Maquina;
use gym\Producto;
use gym\Reserva;
use gym\Rutina;
use gym\User;

class Consultas extends Controller
{

    // consultar las asietncias de un usuario
    public function misAsistencias($idUser)
    {
        $user=User::find($idUser);
        $data = array();
        foreach ($user->lista as $lis) {
            $estado='Asiste: NO';
            if($lis->estado){
                $estado='Asiste: SI';
            }   
            $lista = array(
                'id' => $lis->id ,
                'fecha'=>$lis->created_at->toDateTimeString(),
                'fecha_h'=>$lis->created_at->diffForHumans(),
                'estado'=>$estado,
            );

            array_push($data,$lista);
        }

        return response()->json($data);
    }


    // consultar las dietas de un usuario
    public function misDietas($idUser)
    {
        $user=User::find($idUser);
        $data = array();
        foreach ($user->dietas as $dieta) {
            
            $dieta = array(
                'id'=>$dieta->dietah->id,
                'fecha'=>$dieta->dietah->created_at->toDateTimeString(),
                'fecha_h'=>$dieta->dietah->created_at->diffForHumans(),
                'titulo'=>$dieta->titulo,
                'detalle'=>$this->setText($dieta->detalle),
                'peso'=>'Peso: '.$dieta->dietah->peso,
                'altura'=>'Altura: '.$dieta->dietah->altura,
                'masa'=>'Masa=Peso*Altura, al cuadrado:('.($dieta->dietah->peso/pow($dieta->dietah->altura,2)).')'
                
            );
            array_push($data,$dieta);
        }
      
            
        
        return response()->json($data);
    }

    // convertir html a texto normal
    public function setText($text) {
       return strip_tags(html_entity_decode($text, ENT_QUOTES, 'UTF-8'));
    }

    // consultar los pagos de un usuario
    public function misPagos($idUser)
    {
        $user=User::find($idUser);

        $data = array();
        foreach ($user->pagos as $pago) {
            $pago_i = array(
                'id' =>$pago->id , 
                'fecha'=>$pago->created_at->toDateTimeString(),
                'fecha_h'=>$pago->created_at->diffForHumans(),
                'valor'=>'Valor: '.$pago->valor,
                'titulo'=>'Mes de pago: '.$pago->fecha
            );
            array_push($data,$pago_i);
        }
        return response()->json($data);
    }

    // consultar las rutinas de un usuario
    public function misRutinas($idUser)
    {
        $user=User::find($idUser);

        $data = array();
        foreach ($user->rutinas as $rutina) {
            $dias='';
            foreach ($rutina->dias as $dia) {
                $dias.=$dia.',';
            }

            $rutina_i = array(
                'id' =>$rutina->id , 
                'nombre'=>$rutina->nombre,
                'inicio'=>$rutina->inicio,
                'fin'=>$rutina->fin,
                'dias'=>'Días: '.$dias,
                'descripcion'=>'Descripción: '.$rutina->descripcion
            );
            array_push($data,$rutina_i);
        }
        return response()->json($data);
    }


    // cosultar rutinas no reseeervas por el usuario y rutinas con estado activo
    public function rutinasDisponibles($idUser)
    {
        $user=User::find($idUser);
        $misRutinas_ids=$user->rutinas->pluck('id');
        $rutinas=Rutina::whereNotIn('id',$misRutinas_ids)->where('estado',true)->get();
         $data = array();
        foreach ($rutinas as $rutina) {
            $dias='';
            foreach ($rutina->dias as $dia) {
                $dias.=$dia.',';
            }

            $rutina_i = array(
                'id' =>$rutina->id , 
                'nombre'=>$rutina->nombre,
                'inicio'=>$rutina->inicio,
                'fin'=>
                
                $rutina->fin,
                'dias'=>'Días: '.$dias,
                'descripcion'=>'Descripción: '.$rutina->descripcion
            );
            array_push($data,$rutina_i);
        }
        return response()->json($data);
    }

    public function reservarRutina($idRutina,$idUser)
    {
        $reserva=Reserva::where(['user_id'=>$idUser,'rutina_id'=>$idRutina])->first();
        if(!$reserva){
            $reserva=new Reserva();
            $reserva->user_id=$idUser;
            $reserva->rutina_id=$idRutina;
            $reserva->save();
        }
        $rutina=$reserva->rutina;
        $dias='';
        foreach ($rutina->dias as $dia) {
            $dias.=$dia.',';
        }
        $data = array(
            'id' =>$rutina->id , 
            'nombre'=>$rutina->nombre,
            'inicio'=>'Hora de inicio: '.$rutina->inicio,
            'fin'=>'Hora fin: '.$rutina->fin,
            'dias'=>'Días: '.$dias,
            'descripcion'=>'Descripción: '.$rutina->descripcion
        );

        return response()->json($data);

    }

    public function catalogo()
    {
        $productos=Producto::all();
        $maquinas=Maquina::all();
        $data = array('productos' => $productos,'maquinas'=>$maquinas );
        return view('catalogo.index',$data);
    }

}
