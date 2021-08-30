<?php

namespace App\Controllers;

use App\Models\CompanyModel;
use App\Models\CompanyTypeModel;
use App\Models\ContactModel;

class AdminController extends Controller
{
    public function index()
    {
        $this->render("admin/index");
    }

    public function addcontact()
    {
        if (isset($_POST["submit"])) {
            if (isset($_POST["name"]) && isset($_POST["firstname"]) && isset($_POST["phone"]) && isset($_POST["email"]) 
            && isset($_POST["company"])) {

                if ((empty($_POST["name"])) OR (!is_string($_POST["name"]))) {                                                                            //gives an error if the string is empty or if it is not a string
                    echo "Please provide a valid name!";
                    unset($_POST["name"]);
                }
                else if ((empty($_POST["firstname"])) OR (!is_string($_POST["firstname"]))) {                                                                            //gives an error if the string is empty or if it is not a string
                    echo "Please provide a valid first name!";
                    unset($_POST["firstname"]);
                }
                else if ((empty($_POST["phone"])) OR (!preg_match('/^[0-9]{10}+$/', $_POST["phone"]))) {                                                                            //gives an error if the string is empty or if it is not a string
                    echo "Please provide a valid phone number!";
                    unset($_POST["phone"]);
                }
                else if ((empty($_POST["email"]) OR (false === filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)))) {
                    echo "Please provide a valid email!";
                    unset($_POST["email"]);
                }
                
                $name = $_POST["name"];
                $firstname = $_POST["firstname"];
                $phone = $_POST["phone"];
                $email = $_POST["email"];
                $company = $_POST["company"];

            } else {
                echo "error : MESSAGE";
            }
        }
            $companyModel=new CompanyModel();
            $companyModel->find();
        

        $this->render("admin/addcontact", ["companies"=>$companyModel->data()]);
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
                
                
                $companyname = $_POST["companyname"];
                $tavnumber = $_POST["tvanumber"];
                $phonenumber = $_POST["phonenumber"];
                $companytype = $_POST["companytype"];
                

            } else {
                echo "error : MESSAGE";
            }
        }
        $companyTypeModel=new CompanyTypeModel();
        $companyTypeModel->find();
       

        $this->render("admin/addcompany",["companytypes"=>$companyTypeModel->data()]);
    }
  
}