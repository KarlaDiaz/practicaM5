<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Asistentes extends Model
{
    //
    Protected $table = 'asistentes';
    Protected $fillable = [
        'nombre',
        'email',
        'telefono',
        'evento_id'
    ];
}



