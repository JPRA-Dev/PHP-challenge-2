<?php

namespace App\Controllers;

use App\Models\CompanyModel;
use App\Models\ContactModel;
use App\Models\InvoiceModel;

class InvoiceController extends Controller
{

    /*
        //$invoicesModel->find();
        //$invoicesModel->findOne(1);
        //$invoicesModel->update(["nbrinvoice" => "55555"], ["invoice_id","=","1"]);
        //$invoicesModel->create(["nbrinvoice" => "222222222","dateinvoice" => $now->format('Y-m-d H:i:s'),"company_id" => "3", "telephone" => "4545156421","contact_person_id" => "1"]);
        //$invoicesModel->delete(3);
     */

    public function list()
    {
        $invoicesModel = new InvoiceModel();
        $invoicesModel->find();
        $this->render("invoice/list", ["invoices" => $invoicesModel->data()]);
    }

    public function show($id)
    {
        $invoicesModel = new InvoiceModel();
        $invoicesModel->findOne($id);

        $contactModel = new ContactModel();
        $contactModel->findOne($invoicesModel->data()->contact_person_id);

        $this->render("invoice/show", ["invoice" => $invoicesModel->data(), 'contact'=>$contactModel->data()]);
    }
}