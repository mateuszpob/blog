<?php

namespace App\Services;

use App\Models\User;
use App\Services\PermissionService;
use App\Jobs\ResetPassword;

use App\User\UserService;
class SimplePermissionService implements PermissionService
{
    private array $roles;
    private UserService $userService;

    public function __construct(array $roles, UserService $userService)
    {
        $this->roles = $roles;
        $this->userService = $userService;
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

    public function passwordReset(string $email): void
    {
        $user = $this->userService->getUserByMail($email);
        ResetPassword::dispatch($user, $this->makeUserPassResetLink($user));
    }

    public function makeUserPassResetLink($user): string
    {
        $token = $this->userService->generateToken($user);
        return url("pass-reset/" . $token);
    }
}
