<?php

namespace App\Services;

use App\User;

class PermissionService
{
    public function permissions(String $roleName)
    {
        return config('auth.permissions.' . $roleName);
    }
}
