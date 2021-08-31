<?php

namespace App\Controllers;

use App\Models\CompanyModel;
use App\Models\ContactModel;
use App\Models\InvoiceModel;

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

        $contactModel = new ContactModel();
        $contactModel->findByCompany($id);

        $invoiceModel = new InvoiceModel();
        $invoices = [];

        foreach ($contactModel->data() as $contact)
        {
            $invoiceModel->findByContact($contact->contact_person_id);
            array_push($invoices, ...$invoiceModel->data());
        }

        $this->render("company/show", [
            "company" => $companyModel->data(),
            "invoices" => $invoices,
            "contacts" => $contactModel->data()
        ]);
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