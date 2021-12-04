<?php

namespace App\Policies;

use App\User;
use App\Stock;
use Illuminate\Auth\Access\HandlesAuthorization;

class StockPolicy
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
     * Determine whether the user can create stock.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return true;
    }

    /**
   * Determine whether the user can edit the stock.
   *
   * @param  \App\User  $user
   * @param  \App\Program  $stock
   * @return mixed
   */
    public function edit(User $user, Stock $stock) {
        return $user->id == $stock->user_id;
    }

    /**
   * Determine whether the user can update the stock.
   *
   * @param  \App\User  $user
   * @param  \App\Program  $stock
   * @return mixed
   */
    public function update(User $user, Stock $stock) {
        return $user->id == $stock->user_id;
    }

    /**
   * Determine whether the user can delete the stock.
   *
   * @param  \App\User  $user
   * @param  \App\Program  $stock
   * @return mixed
   */
    public function delete(User $user, Stock $stock) {
        return $user->id == $stock->user_id;
    }
}
