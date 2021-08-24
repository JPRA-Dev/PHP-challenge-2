<?php

namespace App\Controllers;

class ContactController extends Controller
{
    public function list()
    {
        $this->render("contact/list");
    }

    public function show($id)
    {
        $this->render("contact/show", ["id" => $id]);
    }
}