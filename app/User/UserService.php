<?php
namespace App\User;

use App\Models\User;
use Ramsey\Uuid\Type\Integer;

class UserService
{
    private UserRepository $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function createUser(array $attributes): User
    {
        $user = new User();
        $user = $this->setUserAttributes($user, $attributes);
        $this->userRepository->save($user);
        return $user;
    }

    public function getUser(int $id): User
    {
        return $this->userRepository->find($id);
    }

    public function getUsers()
    {
        return $this->userRepository->getAll();
    }

    public function deleteUser(int $id)
    {
        return $this->userRepository->delete($id);
    }

    public function editUser(int $id, array $attributes): User
    {
        $user = $this->userRepository->find($id);
        $user = $this->setUserAttributes($user, $attributes);
        $this->userRepository->save($user);
        return $user;
    }

    private function setUserAttributes(User $user, array $attributes): User
    {
        $user->name = $attributes["name"];
        $user->email = $attributes["email"];
        if(isset($attributes["password"]))
        {
            $user->password = bcrypt($attributes["password"]);
        }
        $user->role = $attributes["role"] ?? null;
        return $user;
    }
}
