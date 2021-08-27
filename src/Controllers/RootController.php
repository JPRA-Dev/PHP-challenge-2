<?php

namespace App\Controllers;

use App\Models\CompanyModel;
use App\Models\ContactModel;
use App\Models\InvoiceModel;

class RootController extends Controller
{
    public function index()
    {
        $invoiceModel = new InvoiceModel();
        $invoiceModel->findLimit(5);
        $companyModel = new CompanyModel();
        $companyModel->findLimit(5);
        $contactModel = new ContactModel();
        $contactModel->findLimit(5);
        $this->render("index", [
            "invoices" => $invoiceModel->data(),
            "companies" => $companyModel->data(),
            "contacts" => $contactModel->data()
        ]);
    }
}