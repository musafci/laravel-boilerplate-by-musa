<?php

namespace App\Http\Controllers;

class FrontController extends Controller
{
    /**
     * Show the application login page.
     * @return \Illuminate\Contracts\Support\Renderable
    */
    public function login()
    {
        return view('auth.login');
    }
}
