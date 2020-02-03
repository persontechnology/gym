<?php

namespace gym\Http\Controllers\Movil;

use Carbon\Carbon;
use Illuminate\Http\Request;
use gym\Http\Controllers\Controller;
use gym\User;
use Illuminate\Support\Facades\Hash;

class Login extends Controller
{
    public function ingresar($email,$password)
    {
        $user=User::where('email',$email)->first();
        if($user){
            if (Hash::check($password, $user->password)) {
                $data = array(
                    'id' => $user->id ,
                    'name'=>$user->name,
                    'email'=>$user->email,
                    'state_user'=>true,
                    'perfil'=>$user->perfil
                );
                return response()->json($data);
            }
            
        }
        return response()->json(null);
    }
    public function ingresarFacebook($email,$names)
    {
        $user=User::where('email',$email)->first();
        if(!$user){
            $user=new User();
            $user->name = $names;
            $user->email = $email;
            $user->password = Hash::make($email);
            $user->nombre=$names;
            $user->apellido='';
            $user->identificacion='';
            $user->perfil='Cliente';
            $user->email_verified_at=Carbon::now();
            $user->save();   
        }
        $data = array(
            'id' => $user->id ,
            'name'=>$user->name,
            'email'=>$user->email,
            'state_user'=>true,
            'perfil'=>$user->perfil
        );
        return response()->json($data);
    }
}
