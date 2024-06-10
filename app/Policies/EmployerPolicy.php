<?php

namespace App\Policies;

use App\Models\Employer;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class EmployerPolicy
{

    public function viewAny(User $user): bool
    {
        //
    }


    public function view(User $user, Employer $employer): bool
    {
        //
    }


    public function create(User $user): bool
    {
        //
    }


    public function update(User $user, Employer $employer): bool
    {
        //
    }


    public function delete(User $user, Employer $employer): bool
    {
        //
    }

    public function restore(User $user, Employer $employer): bool
    {
        //
    }


    public function forceDelete(User $user, Employer $employer): bool
    {
        //
    }
}
