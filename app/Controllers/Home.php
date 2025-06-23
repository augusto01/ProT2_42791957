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

}
