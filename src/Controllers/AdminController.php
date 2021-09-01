<?php

namespace App\Controllers;

use App\Models\CompanyModel;
use App\Models\CompanyTypeModel;
use App\Models\ContactModel;
use App\Models\UserModel;
use App\Models\InvoiceModel;

class AdminController extends Controller
{
    public function index()
    {
        if (!$this->userIsLogged()) $this->redirect(403);
        if (!$this->userHasPermission('admin') && !$this->userHasPermission('moderator')) $this->redirect(403);

        $invoiceModel = new InvoiceModel();
        $invoiceModel->findLimit(5);
        $companyModel = new CompanyModel();
        $companyModel->findLimit(5);
        $contactModel = new ContactModel();
        $contactModel->findLimit(5);
        $this->render("admin/index", [
            "invoices" => $invoiceModel->data(),
            "companies" => $companyModel->data(),
            "contacts" => $contactModel->data(),
            "has_permission_for_delete" => $this->userHasPermission('admin')
        ]);
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
                else if ((empty($_POST["phone"])) OR (!preg_match('/^[0-9]{7}+$/', $_POST["phone"]))) {                                                                            //gives an error if the string is empty or if it is not a string
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

                $contactModel=new ContactModel();
                $contactModel->create(
                    [
                        "lastname"=>$name,
                        "firstname"=>$firstname,
                        "telephone"=>$phone,
                        "email"=>$email,
                        "company_id"=>$company
                    ]);

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

                $invoiceModel=new InvoiceModel();
                $invoiceModel->create(
                    [
                        "nbrinvoice"=>$invoicenumber,
                        "dateinvoice"=>$date,
                        "company_id"=>$company,
                        "contact_person_id"=>$contact
                        
                    ]);


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
            if (isset($_POST["companyname"]) && isset($_POST["tvanumber"]) && isset($_POST["country"]) && isset($_POST["companytype"])) {

                if (empty($_POST["companyname"])) {                                                          
                    echo "Please provide a valid companyname!";
                    unset($_POST["companyname"]);
                }
                else if ((empty($_POST["tvanumber"])) OR (!is_string($_POST["tvanumber"]))) {                                                                           
                    echo "Please provide a valid tva number";
                    unset($_POST["tvanumber"]);
                }
                else if ((empty($_POST["country"]))) {                                                                            
                    echo "Please insert a country!";
                    unset($_POST["country"]);
                }
                
                
                $companyname = $_POST["companyname"];
                $tvanumber = $_POST["tvanumber"];
                $country = $_POST["country"];
                $companytype = $_POST["companytype"];

                $companyModel = new CompanyModel();
                $companyModel->create(
                    [
                        "name" => $companyname,
                        "vatnumber" => $tvanumber,
                        "country" => $country,
                        "company_type_id" => $companytype
                       
                    ]
                );
            } else {
                echo "error : MESSAGE";
            }
        }
        $companyTypeModel=new CompanyTypeModel();
        $companyTypeModel->find();
       

        $this->render("admin/addcompany",["companytypes"=>$companyTypeModel->data()]);
    }

    public function users()
    {
        $userModel = new UserModel();
        $userModel->find();

        $this->render("admin/users",["users"=>$userModel->data(), "userModel"=>$userModel]);
    }

    public function deleteContact($id)
    {
        $contactModel = new ContactModel();
        $contactModel->delete($id);
        $this->redirect('/admin');
    }

    public function deleteInvoice($id)
    {
        $invoiceModel = new InvoiceModel();
        $invoiceModel->delete($id);
        $this->redirect('/admin');
    }

    public function deleteCompany($id)
    {
        $companyModel = new CompanyModel();
        $companyModel->delete($id);
        $this->redirect('/admin');
    }

    public function updateCompany($id)
    {
        if (isset($_POST["submit"])) {
            if (isset($_POST["companyname"]) && isset($_POST["tvanumber"]) && isset($_POST["country"]) && isset($_POST["companytype"])) {

                if (empty($_POST["companyname"])) {                                                          
                    echo "Please provide a valid companyname!";
                    unset($_POST["companyname"]);
                }
                else if ((empty($_POST["tvanumber"])) OR (!is_string($_POST["tvanumber"]))) {                                                                           
                    echo "Please provide a valid tva number";
                    unset($_POST["tvanumber"]);
                }
                else if ((empty($_POST["country"]))) {                                                                            
                    echo "Please insert a country!";
                    unset($_POST["country"]);
                }

                if (isset($_POST["companyname"]) && isset($_POST["tvanumber"]) && isset($_POST["country"]) && isset($_POST["companytype"])) {
                    $companyname = $_POST["companyname"];
                    $tvanumber = $_POST["tvanumber"];
                    $country = $_POST["country"];
                    $companytype = $_POST["companytype"];

                    $companyModel=new CompanyModel();
                    $companyModel->update(
                        [
                            "name" => $companyname,
                            "vatnumber" => $tvanumber,
                            "country" => $country,
                            "company_type_id" => $companytype
                        ],["id","=",$id]
                    );
                }
            }
        }
       
    

        $companyModel = new CompanyModel();
        $companyModel->findOne($id);

        $companyTypeModel=new CompanyTypeModel();
        $companyTypeModel->find();

        $this->render("admin/updatecompany",["company"=>$companyModel->data(), "companytypes"=>$companyTypeModel->data()]);
    }

    public function updateInvoice($id)
    {
        if (isset($_POST["submit"])) {
            if (isset($_POST["invoicenumber"]) && isset($_POST["date"]) && isset($_POST["company"]) && isset($_POST["contact"])) {
                $invoicenumber = $_POST["invoicenumber"];
                $date = $_POST["date"];
                $company = $_POST["company"];
                $contact = $_POST["contact"];

                $invoiceModelUpdate=new InvoiceModel();
                $invoiceModelUpdate->update(
                    [
                        "nbrinvoice"=>$invoicenumber,
                        "dateinvoice"=>$date,
                        "company_id"=>$company,
                        "contact_person_id"=>$contact
                    ],["invoice_id","=",$id]
                );
            }
        }

        $invoiceModel = new InvoiceModel();
        $invoiceModel->findOne($id);

        $companyModel=new CompanyModel();
        $companyModel->find();

        $contactModel=new ContactModel();
        $contactModel->find();

        $this->render("admin/updateinvoice", ["invoice"=>$invoiceModel->data(), "companies"=>$companyModel->data(), "contacts"=>$contactModel->data()]);
    }

    public function updateContact($id)
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
                else if ((empty($_POST["phone"])) OR (!preg_match('/^[0-9]{7}+$/', $_POST["phone"]))) {                                                                            //gives an error if the string is empty or if it is not a string
                    echo "Please provide a valid phone number!";
                    unset($_POST["phone"]);
                }
                else if ((empty($_POST["email"]) OR (false === filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)))) {
                    echo "Please provide a valid email!";
                    unset($_POST["email"]);
                }

                if (isset($_POST["name"]) && isset($_POST["firstname"]) && isset($_POST["phone"]) && isset($_POST["email"]) && isset($_POST["company"])) {
                    $name = $_POST["name"];
                    $firstname = $_POST["firstname"];
                    $phone = $_POST["phone"];
                    $email = $_POST["email"];
                    $company = $_POST["company"];

                    $contactModel=new ContactModel();
                    $contactModel->update(
                        [
                            "lastname"=>$name,
                            "firstname"=>$firstname,
                            "telephone"=>$phone,
                            "email"=>$email,
                            "company_id"=>$company
                        ],["contact_person_id","=",$id]
                    );
                }
            }
        }

        $contactModel = new ContactModel();
        $contactModel->findOne($id);

        $companyModel=new CompanyModel();
        $companyModel->find();
        $this->render("admin/updatecontact", ["contact"=>$contactModel->data(), "companies"=>$companyModel->data()]);
    }

}