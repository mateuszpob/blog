<?php
namespace App\User;

use App\Models\User;

interface UserRepository
{
    public function find(int $id): User;
    public function save(User $post): void;
    public function getAll(): array;
    public function delete(int $id);
    public function findByEmail(String $email): User;
}
