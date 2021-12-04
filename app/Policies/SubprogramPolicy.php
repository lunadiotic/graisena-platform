<?php

namespace App\Policies;

use App\Subprogram;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class SubprogramPolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Determine whether the user can create program.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return true;
    }

    /**
   * Determine whether the user can edit the program.
   *
   * @param  \App\User  $user
   * @param  \App\Program  $program
   * @return mixed
   */
    public function edit(User $user, Subprogram $program) {
        return $user->id == $program->user_id;
    }

    /**
   * Determine whether the user can update the subprogram.
   *
   * @param  \App\User  $user
   * @param  \App\Program  $subprogram
   * @return mixed
   */
    public function update(User $user, Subprogram $subprogram) {
        return $user->id == $subprogram->user_id;
    }

    /**
   * Determine whether the user can delete the subprogram.
   *
   * @param  \App\User  $user
   * @param  \App\Program  $subprogram
   * @return mixed
   */
    public function delete(User $user, Subprogram $subprogram) {
        return $user->id == $subprogram->user_id;
    }
}
