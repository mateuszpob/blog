<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class UserPolicy
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

    public function get(User $user): bool
    {
        return in_array('users.get', $user->permissions, true);
    }

    public function create(User $user): bool
    {
        return in_array('users.create', $user->permissions, true);
    }

    public function edit(User $user): bool
    {
        return in_array('users.edit', $user->permissions, true);
    }

    public function delete(User $user): bool
    {
        return in_array('users.delete', $user->permissions, true);
    }
}
