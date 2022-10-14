<?php

namespace App\Services;

use App\Models\User;

interface PermissionService
{
    public function roles(): array;
    public function permissions(String $roleName): array;
    public function userCan(User $user, String $rule): bool;
    public function passwordReset(string $email): void;
    public function makeUserPassResetLink($user): string;
}
