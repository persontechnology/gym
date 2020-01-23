<?php

namespace gym;

use Illuminate\Database\Eloquent\Model;

class Rutina extends Model
{
    protected $casts = [
        'dias' => 'array'
    ];

    public function reservas()
    {
        return $this->belongsToMany(User::class, 'reservas', 'rutina_id', 'user_id')
        ->as('reservas')->withPivot('id');
    }
    

}
