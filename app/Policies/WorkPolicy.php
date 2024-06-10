<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Work;
use Illuminate\Auth\Access\Response;

class WorkPolicy
{

    public function viewAny(?User $user): bool
    {
        return true;
    }

    public function view(?User $user, Work $work): bool
    {
        return true;
    }

    public function create(User $user): bool
    {
        return false;
    }


    public function update(User $user, Work $work): bool
    {
        return false;
    }

    public function delete(User $user, Work $work): bool
    {
        return false;
    }

    public function restore(User $user, Work $work): bool
    {
        return false;
    }


    public function forceDelete(User $user, Work $work): bool
    {
        return false;
    }


    public function apply(User $user, Work $work): bool
    {
        return !$work->hasNotApplied($user);
    }
}
