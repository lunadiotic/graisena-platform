<?php

namespace App\Policies;

use App\Nursery;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class NurseryPolicy
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
     * Determine whether the user can create nursery.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return true;
    }

    /**
   * Determine whether the user can edit the nursery.
   *
   * @param  \App\User  $user
   * @param  \App\Nursery  $nursery
   * @return mixed
   */
    public function edit (User $user, Nursery $nursery) {
        return $user->id == $nursery->user_id;
    }

    /**
   * Determine whether the user can update the nursery.
   *
   * @param  \App\User  $user
   * @param  \App\Nursery  $nursery
   * @return mixed
   */
    public function update (User $user, Nursery $nursery) {
        return $user->id == $nursery->user_id;
    }

    /**
   * Determine whether the user can delete the nursery.
   *
   * @param  \App\User  $user
   * @param  \App\Nursery  $nursery
   * @return mixed
   */
    public function delete (User $user, Nursery $nursery) {
        return $user->id == $nursery->user_id;
    }
}
