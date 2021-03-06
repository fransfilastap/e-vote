<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Vote;
use Carbon\Carbon;
use Illuminate\Auth\Access\HandlesAuthorization;

class VotePolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @param  \App\Models\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        //
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Vote  $vote
     * @return mixed
     */
    public function view(User $user, Vote $vote)
    {
        if (Carbon::now()->between($vote->start_time, $vote->end_time))
            return true;
        return false;
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        //
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Vote  $vote
     * @return mixed
     */
    public function update(User $user, Vote $vote)
    {
        //
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Vote  $vote
     * @return mixed
     */
    public function delete(User $user, Vote $vote)
    {
        //
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Vote  $vote
     * @return mixed
     */
    public function restore(User $user, Vote $vote)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Vote  $vote
     * @return mixed
     */
    public function forceDelete(User $user, Vote $vote)
    {
        //
    }

    public function voting(User $user, Vote $vote)
    {
        dd('test');
        if (Carbon::now()->between($vote->start_time, $vote->end_time))
            return true;
        return false;
    }

    public function viewResult(User $user, Vote $vote)
    {
        dd('test');
        if (Carbon::now()->isAfter($vote->end_time))
            return true;
        return false;
    }
}
