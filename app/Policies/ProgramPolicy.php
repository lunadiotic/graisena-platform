<?php

namespace App\Policies;

use App\Program;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class ProgramPolicy
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
    public function edit (User $user, Program $program) {
        return $user->id == $program->user_id;
    }

    /**
   * Determine whether the user can update the program.
   *
   * @param  \App\User  $user
   * @param  \App\Program  $program
   * @return mixed
   */
    public function update (User $user, Program $program) {
        return $user->id == $program->user_id;
    }

    /**
   * Determine whether the user can delete the program.
   *
   * @param  \App\User  $user
   * @param  \App\Program  $program
   * @return mixed
   */
    public function delete (User $user, Program $program) {
        return $user->id == $program->user_id;
    }
}
