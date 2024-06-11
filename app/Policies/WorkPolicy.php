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

    public function viewAnyEmployer(?User $user): bool
    {
        return true;
    }

    public function view(?User $user, Work $work): bool
    {
        return true;
    }

    public function create(User $user): bool
    {
        return null !== $user->employer;
    }


    public function update(User $user, Work $work): bool|Response
    {
        if($work->employer->user_id !== $user->id){
            return false;
        }

        if($work->workApplications()->count() > 0){
            return Response::deny('cannot change the job with applications');
        }

        return true;
    }

    public function delete(User $user, Work $work): bool
    {
        return $work->employer->user_id === $user->id;
    }

    public function restore(User $user, Work $work): bool
    {
        return $work->employer->user_id === $user->id;;
    }


    public function forceDelete(User $user, Work $work): bool
    {
        return $work->employer->user_id === $user->id;;
    }


    public function apply(User $user, Work $work): bool
    {
        return !$work->hasNotApplied($user);
    }
}
