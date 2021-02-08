<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comunicado extends Model
{
    //Campos q se agregan
    protected $fillable = [
        'titulo', 'mensaje', 'imagen', 'uuid'
    ];

    public function autor ()
    {
        return $this->belongsto(User::class, 'user_id'); //FK de esta tabla
    }
}