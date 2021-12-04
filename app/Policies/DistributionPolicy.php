<?php

namespace App\Policies;

use App\User;
use App\Distribution;
use Illuminate\Auth\Access\HandlesAuthorization;

class DistributionPolicy
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
     * Determine whether the user can create distribution.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return true;
    }

    /**
   * Determine whether the user can edit the distribution.
   *
   * @param  \App\User  $user
   * @param  \App\Distribution  $distribution
   * @return mixed
   */
    public function edit (User $user, Distribution $distribution) {
        return $user->id == $distribution->user_id;
    }

    /**
   * Determine whether the user can update the distribution.
   *
   * @param  \App\User  $user
   * @param  \App\Distribution  $distribution
   * @return mixed
   */
    public function update (User $user, Distribution $distribution) {
        return $user->id == $distribution->user_id;
    }

    /**
   * Determine whether the user can delete the distribution.
   *
   * @param  \App\User  $user
   * @param  \App\Distribution  $distribution
   * @return mixed
   */
    public function delete (User $user, Distribution $distribution) {
        return $user->id == $distribution->user_id;
    }
}
