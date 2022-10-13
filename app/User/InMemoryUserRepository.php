<?php
namespace App\User;

use App\Models\User;

class InMemoryUserRepository // implements UserRepository // @TODO wywalic albo zaimplementowac
{
    private array $users;

    public function __construct()
    {
        $this->users = [];
    }

    public function find(int $id): User
    {
        return $this->users[$id];
    }

    public function save(User $user): void
    {
        $this->users[$user->id] = $user;
    }

    public function getAll()
    {
        return $this->users;
    }
}
