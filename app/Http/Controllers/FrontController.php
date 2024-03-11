<?php

namespace App\Http\Controllers;

use App\Models\AppSetting;

class FrontController extends Controller
{
    /**
     * Show the application login page.
     * @return \Illuminate\Contracts\Support\Renderable
    */
    public function login()
    {
        $app_name = AppSetting::value('app_name');
        return view('auth.login', compact('app_name'));
    }
}
