<?php

namespace App\Policies;

use App\User;
use App\Recette;
use Illuminate\Auth\Access\HandlesAuthorization;

class RecettePolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any recettes.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {

    }

    /**
     * Determine whether the user can view the recette.
     *
     * @param  \App\User  $user
     * @param  \App\Recette  $recette
     * @return mixed
     */
    public function view(User $user, Recette $recette)
    {

    }

    /**
     * Determine whether the user can create recettes.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        //
    }

    /**
     * Determine whether the user can update the recette.
     *
     * @param  \App\User  $user
     * @param  \App\Recette  $recette
     * @return mixed
     */
    public function update(User $user, Recette $recette)
    {
        return $user->id == $recette->user_id;
    }

    /**
     * Determine whether the user can delete the recette.
     *
     * @param  \App\User  $user
     * @param  \App\Recette  $recette
     * @return mixed
     */
    public function delete(User $user, Recette $recette)
    {
        return $user->id == $recette->user_id;
    }

    /**
     * Determine whether the user can restore the recette.
     *
     * @param  \App\User  $user
     * @param  \App\Recette  $recette
     * @return mixed
     */
    public function restore(User $user, Recette $recette)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the recette.
     *
     * @param  \App\User  $user
     * @param  \App\Recette  $recette
     * @return mixed
     */
    public function forceDelete(User $user, Recette $recette)
    {
      return $user->id == $recette->user_id;
    }
}
