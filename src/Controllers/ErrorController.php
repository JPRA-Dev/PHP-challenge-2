<?php

namespace App\Controllers;

class ErrorController extends Controller
{
    public function error404()
    {
        $this->render("404");
    }

    public function error500()
    {
        $this->render("500");
    }
}