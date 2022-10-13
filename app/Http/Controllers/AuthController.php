<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\LoginRequest;

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

    public function login(LoginRequest $request) {
        if (auth()->attempt($request->validated())) {
            return redirect()->route('home');
        } else {
            return back()->withInput()->withErrors(["email" => "Invalid email or password"]);
        }
    }
}
