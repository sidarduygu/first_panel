<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    //giris sayfasi viewi
    public function loginView()
    {
        return view('panel.login');
    }
    
    //kayit ol viewi
    public function registerView()
    {
        return view('panel.register');
    }

    //sifremi unuttum viewi
    public function forgotPasswordView()
    {
        return view('panel.register');
    }

    
}
