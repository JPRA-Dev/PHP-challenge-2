<?php

namespace App\Controllers;

class TestController extends Controller
{
    public function index()
    {
        $this->render("test/index");
    }

    public function show($id)
    {
        $this->render("test/show", ["id" => $id]);
    }
}