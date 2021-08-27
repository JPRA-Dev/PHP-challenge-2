<?php

namespace App\Controllers;

use App\Helpers\InputHelper;

class AdminController extends Controller
{
    public function index()
    {
        $this->render("admin/index");
    }

    public function addcontact()
    {
        $this->render("admin/addcontact");
    }

    public function addinvoice()
    {
        $this->render("admin/addinvoice");
    }

    public function addcompany()
    {
        $this->render("admin/addcompany");
    }

    public function addcompanyPost()
    {
        $this->render("admin/addcompany");
    }
}