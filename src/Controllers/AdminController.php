<?php

namespace App\Controllers;

use App\Models\CompanyModel;
use App\Models\ContactModel;

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
        if (isset($_POST["submit"])) {
            if (isset($_POST["invoicenumber"]) && isset($_POST["date"]) && isset($_POST["company"]) && isset($_POST["contact"])) {
                $invoicenumber = $_POST["invoicenumber"];
                $date = $_POST["date"];
                $company = $_POST["company"];
                $contact = $_POST["contact"];


            } else {
                echo "error : MESSAGE";
            }
        }
        $companyModel=new CompanyModel();
        $companyModel->find();
        $contactModel=new ContactModel();
        $contactModel->find();
        

        $this->render("admin/addinvoice", ["companies"=>$companyModel->data(), "contacts"=>$contactModel->data()]);
    }

    public function addcompany()
    {
        $this->render("admin/addcompany");
    }

    public function addcompanyPost()
    {
        if (isset($_POST["email"])) {

        }

        $this->render("admin/addcompany");
    }
}