<?php

namespace App\Controllers;

use App\Models\CompanyModel;

class CompanyController extends Controller
{
    public function list()
    {
        $companyModel = new CompanyModel();
        $companyModel->find();
        $this->render("company/list", ["companies" => $companyModel->data()]);
    }

    public function show($id)
    {
        $companyModel = new CompanyModel();
        $companyModel->findOne($id);
        $this->render("company/show", ["company" => $companyModel->data()]);
    }
}

if (isset($_POST["submit"])) {
    if (isset($_POST["companyname"]) && isset($_POST["tvanumber"]) && isset($_POST["phonenumber"]) && isset($_POST["companytype"])) {
        $companyname = $_POST["companyname"];
        $tvanumber = $_POST["tvanumber"];
        $phonenumber = $_POST["phonenumber"];
        $companytype = $_POST["companytype"];


    } else {
        echo "error : MESSAGE";
    }
}