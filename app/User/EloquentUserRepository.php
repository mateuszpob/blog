<?php
namespace App\User;

use App\Models\User;

class EloquentUserRepository implements UserRepository
{
    public function find(int $id): ?User
    {
        return User::find($id);
    }

    public function save(User $user): void
    {
        $user->save();
    }

    public function getAll(): array
    {
        return User::all()->all();
    }

    public function delete(int $id)
    {
        $user = $this->find($id);
        if($user) {
            $user->delete();
        }
    }

    public function findByEmail(String $email): ?User
    {
        return User::where("email", $email)->first();
    }

    public function findByToken(string $token): ?User
    {
        return User::where("token", $token)->first();
    }
}
