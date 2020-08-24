<?php

namespace App\Policies;

use App\Comunicado;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class ComunicadoPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        //
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\User  $user
     * @param  \App\Comunicado  $comunicado
     * @return mixed
     */
    public function view(User $user, Comunicado $comunicado)
    {
        //
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        //
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\User  $user
     * @param  \App\Comunicado  $comunicado
     * @return mixed
     */
    public function update(User $user, Comunicado $comunicado)
    {
        //Revisa si es usuario autenticado es el mismo que creo la receta
        return $user->id === $comunicado->user_id;
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\User  $user
     * @param  \App\Comunicado  $comunicado
     * @return mixed
     */
    public function delete(User $user, Comunicado $comunicado)
    {
        //Revisa si el usuario autenticado es el mismo que creo la receta
        return $user->id === $comunicado->user_id;
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\User  $user
     * @param  \App\Comunicado  $comunicado
     * @return mixed
     */
    public function restore(User $user, Comunicado $comunicado)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\User  $user
     * @param  \App\Comunicado  $comunicado
     * @return mixed
     */
    public function forceDelete(User $user, Comunicado $comunicado)
    {
        //
    }
}
