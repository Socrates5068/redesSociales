<?php

namespace App;

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
        'name', 'email', 'password', 'rol',
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

    public function sendEmailVerificationNotification()
    {
        $this->notify(new Notifications\UsuarioCreado);
    }


    //Evento que se ejecuta cuando un usuario es creado
    protected static function boot(){
        parent::boot();

        //Asiganar perfil cuando se cree un usuario nuevo
        static::created(function ($user) {
            $user->perfil()->create();
        });
    }

    /* Relación 1:n de Usuario a comunicados */
    public function comunicados(){
        return $this->hasMany(Comunicado::class);
    }

    //relacion 1:1 de usuario y perfil
    public function perfil(){
        return $this->hasOne(Perfil::class);
    }
}
