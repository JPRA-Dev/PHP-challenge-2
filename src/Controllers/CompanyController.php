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