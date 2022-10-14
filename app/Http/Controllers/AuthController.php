<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\PassResetRequest;
use Illuminate\Support\Facades\Auth;
use App\Services\PermissionService;
use App\User\UserService;

class AuthController extends Controller
{
    private PermissionService $permissionService;
    private UserService $userService;

    public function __construct(PermissionService $permissionService, UserService $userService)
    {
        $this->permissionService = $permissionService;
        $this->userService = $userService;
    }
    /**
     * Show login form
     *
     * @return \Illuminate\Http\Response
     */
    public function getLoginForm()
    {
        return view('login');
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('home');
    }

    public function login(LoginRequest $request)
    {
        if (auth()->attempt($request->validated())) {
            return redirect()->route('home');
        } else {
            return back()->withInput()->withErrors(["email" => "Invalid email or password"]);
        }
    }

    public function getPassResetForm()
    {
        return view('passreset');
    }

    public function passReset(Request $request)
    {
        $email = $request->validate(["email" => "email|required"])["email"];
        $this->permissionService->passwordReset($email);
        return redirect()->route('home');
    }

    public function passResetForm2()
    {
        return view('passreset2');
    }


    public function processPassReset(PassResetRequest $request, string $token)
    {
        $this->userService->processPasswordResetAction($request->validated()["password"], $token);
        return redirect()->route('login.form');
    }

}
