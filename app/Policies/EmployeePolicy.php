<?php

namespace App\Policies;

use App\Company;
use App\User;
use App\Employee;
use Illuminate\Auth\Access\HandlesAuthorization;

class EmployeePolicy
{
    use HandlesAuthorization;


    public function create(User $user)
    {
        //
    }

    /**
     * Determine whether the user can update the employee.
     *
     * @param  \App\User  $user
     * @param  \App\Employee  $employee
     * @return mixed
     */
    public function update(User $user, Company $company)
    {
        dd($user->id == $company->user_id);
        return $user->id == $company->user_id;
    }
}
