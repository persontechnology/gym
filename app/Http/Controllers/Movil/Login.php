<?php

namespace gym\Http\Controllers\Movil;

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
}
