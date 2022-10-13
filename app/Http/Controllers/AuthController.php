<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\LoginRequest;
use Illuminate\Support\Facades\Auth;
class AuthController extends Controller
{
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
}
