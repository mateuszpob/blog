<?php
namespace App\User;

use App\Models\User;
use Illuminate\Support\Arr;
use Ramsey\Uuid\Type\Integer;
use App\Events\UserRegistered;

class UserService
{
    private UserRepository $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
        $this->defaultRoleName = "user";
    }

    public function createUser(array $attributes): User
    {
        $user = new User();
        $user = $this->setUserAttributes($user, $attributes);
        $this->userRepository->save($user);
        return $user;
    }

    public function registerUser(array $attributes): User
    {
        $user = $this->createUser($attributes);
        event(new UserRegistered($user));
        return $user;
    }

    public function getUser(int $id): User
    {
        return $this->userRepository->find($id);
    }

    public function getUserByMail(String $email): ?User
    {
        return $this->userRepository->findByEmail($email);
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

    public function setDefaultRole(User $user)
    {
        $user->role = $this->defaultRoleName;
        $this->userRepository->save($user);
    }

    public function generateToken(User $user): string
    {
        $token = $this->tokenGenerator();
        $user->token = md5($token);
        $this->userRepository->save($user);
        return $token;
    }

    public function processPasswordResetAction($password, $token): void
    {
        $user = $this->userRepository->findByToken(md5($token));


        if(empty($user)) {
            return;
        }

        $user->password = bcrypt($password);
        $this->userRepository->save($user);
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

    private function tokenGenerator(int $length = 10): string
    {
        return substr(str_shuffle(str_repeat($x='0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ', ceil($length/strlen($x)) )),1,$length);
    }


}
