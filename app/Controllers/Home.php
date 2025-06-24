<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index(): string
    {
        return view('front/index');

    }

    public function eventos()
    {
        return view('front/eventos'); 
    }

    public function login()
    {
        return view('front/login'); 
    }
    public function registrarse()
    {
        return view('front/registrarse'); 
    }
    public function quienesSomos()
    {
        return view('front/quienes-somos'); 
    }

}
