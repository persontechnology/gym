<?php

namespace gym\Http\Controllers\Auth;

use Carbon\Carbon;
use Illuminate\Http\Request;
use gym\Http\Controllers\Controller;
use gym\User;
use Illuminate\Support\Facades\Auth;
use Socialite;


class SocialAuthController extends Controller
{
    // Metodo encargado de la redireccion a Facebook
    public function redirectToProvider($provider)
    {
        return Socialite::driver($provider)->redirect();
    }
    
    // Metodo encargado de obtener la información del usuario
    public function handleProviderCallback($provider)
    {
        // Obtenemos los datos del usuario
        $social_user = Socialite::driver($provider)->user(); 
        // Comprobamos si el usuario ya existe
        $user = User::where('email', $social_user->email)->first();
        if ($user) { 
            $user->email_verified_at=Carbon::now();
            $user->save();
            return $this->authAndRedirect($user); // Login y redirección
        } else {  
            // En caso de que no exista creamos un nuevo usuario con sus datos.
            $user = User::create([
                'name' => $social_user->name,
                'email' => $social_user->email,
                'avatar' => $social_user->avatar,
                'nombre'=>$social_user->name,
                'apellido'=>'',
                'cedula'=>'',
                'perfil'=>'Cliente',
                'email_verified_at'=>Carbon::now()
            ]);
 
            return $this->authAndRedirect($user); // Login y redirección
        }
    }
 
    // Login y redirección
    public function authAndRedirect($user)
    {
        Auth::login($user);
 
        return redirect()->to('/home');
    }
}
