<?php

namespace App\Services;

use App\Models\User;
use App\Services\PermissionService;

class SimplePermissionService implements PermissionService
{
    private array $roles;

    public function __construct(array $roles)
    {
        $this->roles = $roles;
    }

    public function roles(): array
    {
        return $this->roles;
    }

    public function permissions(String $roleName): array
    {
        return $this->roles[$roleName];
    }

    public function userCan(User $user, String $rule): bool
    {
        return in_array($rule, $this->permissions($user->role), true);
    }
}
