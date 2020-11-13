<?php

namespace App\Policies;

use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class UserPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @param  \App\User  $user_authenticated
     * @return mixed
     */
    public function viewAny(User $user_authenticated){
        //
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\User  $user_authenticated
     * @param  \App\User  $user
     * @return mixed
     */
    public function view(User $user_authenticated, User $user, $permission = null){
      if ($user_authenticated->havePermission($permission[0])) {
        return true;
      }
      else if ($user_authenticated->havePermission($permission[1])) {
        return $user_authenticated->id === $user->id;
      }
      else {
        return false;
      }
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\User  $user_authenticated
     * @return mixed
     */
    public function create(User $user_authenticated){
      //return $user_authenticated->id === $user->id;
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\User  $user_authenticated
     * @param  \App\User  $user
     * @return mixed
     */
    public function update(User $user_authenticated, User $user, $permission = null){
      if ($user_authenticated->havePermission($permission[0])) {
        return true;
      }
      else if ($user_authenticated->havePermission($permission[1])) {
        return $user_authenticated->id === $user->id;
      }
      else {
        return false;
      }
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\User  $user_authenticated
     * @param  \App\User  $user
     * @return mixed
     */
    public function delete(User $user_authenticated, User $user) {
        //
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\User  $user_authenticated
     * @param  \App\User  $user
     * @return mixed
     */
    public function restore(User $user_authenticated, User $user){
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\User  $user_authenticated
     * @param  \App\User  $user
     * @return mixed
     */
    public function forceDelete(User $user_authenticated, User $user){
        //
    }
}
