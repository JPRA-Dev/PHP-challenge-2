<?php

namespace App\Controllers;

class AuthController extends Controller
{
    public function login()
    {
        $this->render("login");
    }
}