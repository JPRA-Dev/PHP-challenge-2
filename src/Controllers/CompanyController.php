<?php

namespace App\Controllers;

class CompanyController extends Controller
{
    public function list()
    {
        $this->render("company/list");
    }

    public function show($id)
    {
        $this->render("company/show", ["id" => $id]);
    }
}