<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\RegisterUserRequest;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\EditUserRequest;
use App\Models\User;
use App\User\UserService;
use App\Policies\UserPolicy;

class UsersController extends Controller
{
    private UserService $userService;

    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }
    /**
     * Show register form
     *
     * @return \Illuminate\Http\Response
     */
    public function getRegisterForm()
    {
        return view('users.register');
    }
    /**
     * Store a created user
     *
     * @param User $user
     * @param RegisterUserRequest $request
     *
     * @return \Illuminate\Http\Response
     */
    public function register(User $user, RegisterUserRequest $request)
    {
        $this->userService->createUser($request->validated());
        return response("OK", 201);
    }






    public function getUsers()
    {
        $this->authorize('get', User::class);

        $users = $this->userService->getUsers();
        return view('admin.users', ["users" => $users]);
    }
    /**
     * Show create form
     *
     * @return \Illuminate\Http\Response
     */
    public function getUserCreateForm()
    {
        $this->authorize('create', User::class);
        return view('admin.create_user', ["roles" => array_keys(config('auth.permissions'))]);
    }

    public function storeNewUser(StoreUserRequest $request)
    {
        $this->authorize('create', User::class);
        $this->userService->createUser($request->validated());
        return redirect()->route('get.users');
    }

    public function getEditUserForm(int $id) {
        $this->authorize('edit', User::class);

        $user = $this->userService->getUser($id);
        if(empty($user)) {
            abort(404);
        }
        return view('admin.create_user', ["roles" => array_keys(config('auth.permissions')), "user" => $user]);
    }

    public function editUser(EditUserRequest $request, int $id) {
        $this->authorize('edit', User::class);

        $user = $this->userService->getUser($id);
        if(empty($user)) {
            abort(404);
        }

        $this->userService->editUser($id, $request->validated());
        return redirect()->route('get.users');
    }


    public function deleteUser(int $id) {
        $this->authorize('delete', User::class);

        $this->userService->deleteUser($id);
        return redirect()->route('get.users');
    }

}
