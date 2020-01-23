<?php

namespace gym;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable implements MustVerifyEmail
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','nombre','apellido','cedula','perfil','avatar','email_verified_at'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function pagos()
    {
        return $this->hasMany(Pago::class,'users_id');
    }

    public function lista()
    {
        return $this->hasMany(Lista::class,'users_id');   
    }

    //un usuario tiene historial de dietas
    public function dietas()
    {
        return $this->belongsToMany(Dieta::class, 'dietah', 'users_id', 'dieta_id')
        ->as('dietah')
        ->withTimestamps()
        ->withPivot(['peso','altura','id']);
    }

    // un usuaro tiene rutinas reservados
    public function rutinas()
    {
        return $this->belongsToMany(Rutina::class, 'reservas', 'user_id', 'rutina_id')
        ->as('reservas')
        ->withTimestamps()
        ->withPivot(['id']);
    }
}
