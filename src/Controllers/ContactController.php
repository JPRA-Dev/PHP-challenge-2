<?php

namespace App\Controllers;

use App\Models\ContactModel;

class ContactController extends Controller
{
    /*
        $contactModel->find();
        $contactModel->findOne(3);
        $contactModel->update(["firstname" => "test"], ["contact_person_id","=","2"]);
        $contactModel->delete(2);
        $contactModel->create(["firstname" => "ppppp","lastname" => "jjjjj","email" => "test@gmail.com","company_id" => "3","telephone" => "84654648915"]);
     */

    public function list()
    {
        $contactModel = new ContactModel();
        $contactModel->find();
        $this->render("contact/list", ["contacts" => $contactModel->data()]);
    }

    public function show($id)
    {
        $contactModel = new ContactModel();
        $contactModel->findOne($id);
        $this->render("contact/show", ["contact" => $contactModel->data()]);
    }
}