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
        if (isset($_POST["submit"])) {
            if (isset($_POST["companyname"]) && isset($_POST["tavnumber"]) && isset($_POST["phonenumber"]) && isset($_POST["companytype"])) {

                if (empty($_POST["companyname"])) {                                                          
                    echo "Please provide a valid companyname!";
                    unset($_POST["companyname"]);
                }
                else if ((empty($_POST["tavnumber"])) OR (!is_string($_POST["tavnumber"]))) {                                                                           
                    echo "Please provide a valid tva number";
                    unset($_POST["tavnumber"]);
                }
                else if ((empty($_POST["phonenumber"])) OR (!preg_match('/^[0-9]{10}+$/', $_POST["phonenumber"]))) {                                                                            
                    echo "Please provide a valid phone number!";
                    unset($_POST["phonenumber"]);
                }
                else if (empty($_POST["companytype"]) OR (!filter_var($_POST["companytype"]))) {
                    echo "Please provide a valid company type!";
                    unset($_POST["companytype"]);
                }
                
                $companyname = $_POST["companyname"];
                $tavnumber = $_POST["tavnumber"];
                $phonenumber = $_POST["phonenumber"];
                $companytype = $_POST["companytype"];
                

            } else {
                echo "error : MESSAGE";
            }
        }
               

        $this->render("admin/addcompany");
    }
   

    public function addcompanyPost()
    {
        $this->render("admin/addcompany");
    }
}