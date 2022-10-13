<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;
use App\User\UserService;
use App\Services\PermissionService;
class LoginRequest extends FormRequest
{
    private UserService $userService;
    private PermissionService $permissionService;

    public function __construct(UserService $userService, PermissionService $permissionService)
    {
        $this->userService = $userService;
        $this->permissionService = $permissionService;
    }

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(Request $request)
    {
        $user = $this->userService->getUserByMail($request->get('email'));
        if(empty($user)) {
            return false;
        }
        return $this->permissionService->userCan($user, 'login');

    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'email' => 'required|email',
            'password' => 'required|alphaNum|min:6' //@TODO min:8
        ];
    }
}
