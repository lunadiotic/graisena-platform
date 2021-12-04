<?php

namespace App\Policies;

use App\User;
use App\DistributionSeed;
use Illuminate\Auth\Access\HandlesAuthorization;

class DistributionSeedPolicy
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
     * Determine whether the user can create distributionseed.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return true;
    }

    /**
   * Determine whether the user can edit the distributionseed.
   *
   * @param  \App\User  $user
   * @param  \App\Program  $distributionseed
   * @return mixed
   */
    public function edit(User $user, DistributionSeed $distributionseed) {
        return $user->id == $distributionseed->user_id;
    }

    /**
   * Determine whether the user can update the distributionseed.
   *
   * @param  \App\User  $user
   * @param  \App\Program  $distributionseed
   * @return mixed
   */
    public function update(User $user, DistributionSeed $distributionseed) {
        return $user->id == $distributionseed->user_id;
    }

    /**
   * Determine whether the user can delete the distributionseed.
   *
   * @param  \App\User  $user
   * @param  \App\Program  $distributionseed
   * @return mixed
   */
    public function delete(User $user, DistributionSeed $distributionseed) {
        return $user->id == $distributionseed->user_id;
    }
}
