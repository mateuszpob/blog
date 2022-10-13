<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use App\Services\PermissionService;
class UserPolicy
{
    use HandlesAuthorization;

    private PermissionService $permissionServics;
    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct(PermissionService $permissionServics)
    {
        $this->permissionServics = $permissionServics;
    }

    public function get(User $user): bool
    {
        return $this->permissionServics->userCan($user, 'users.get');
    }

    public function create(User $user): bool
    {
        return $this->permissionServics->userCan($user, 'users.create');
    }

    public function edit(User $user): bool
    {
        return $this->permissionServics->userCan($user, 'users.edit');
    }

    public function delete(User $user): bool
    {
        return $this->permissionServics->userCan($user, 'users.delete');
    }
}
