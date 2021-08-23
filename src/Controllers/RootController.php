<?php

namespace App\Controllers;

class RootController extends Controller
{
    public function index()
    {
        $this->render("index");
    }
}