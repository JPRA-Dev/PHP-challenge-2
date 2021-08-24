<?php

namespace App\Controllers;

class InvoiceController extends Controller
{
    public function list()
    {
        $this->render("invoice/list");
    }

    public function show($id)
    {
        $this->render("invoice/show", ["id" => $id]);
    }
}