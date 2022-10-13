<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    // @TODO
    public function getHomePage()
    {
        return view('home');
    }
}
