<?php


namespace App\Models;

use Exception;


class InvoiceModel extends Model
{
    public $_data;

    public function find($params=null)
    {
        if (isset($params)){
            $field= (is_numeric($params)) ? 'invoice_id' : 'nbrinvoice';
            $data = $this->getDB()->getWithJointure('invoices', "LEFT JOIN contact_person ON contact_person.contact_person_id=invoices.contact_person_id LEFT JOIN company ON company.id=invoices.company_id LEFT JOIN company_type ON company.company_type_id=company_type.company_type_id",array($field, '=', $params));

            $this->_data = $data;
        } else {
            $data = $this->getDB()->getWithJointure('invoices', "LEFT JOIN contact_person ON contact_person.contact_person_id=invoices.contact_person_id LEFT JOIN company ON company.id=invoices.company_id LEFT JOIN company_type ON company.company_type_id=company_type.company_type_id");

            $this->_data = $data;
        }
    }

    public function findOne($params=null)
    {
        if($params){
            $field= (is_numeric($params)) ? 'invoice_id' : 'nbrinvoice';
            $data = $this->getDB()->getWithJointure('invoices', "LEFT JOIN contact_person ON contact_person.contact_person_id=invoices.contact_person_id LEFT JOIN company ON company.id=invoices.company_id LEFT JOIN company_type ON company.company_type_id=company_type.company_type_id", array($field, '=', $params));

            $this->_data = $data->first();
            return true;
        }
        return false;
    }

    public function update($fields = array(),$id=array())
    {
        if(!$this->getDB()->update('invoices',$id,$fields)){
            throw new Exception('There was a problem updating.');
        }
    }

    public function create($fields = array())
    {
        if(!$this->getDB()->insert('invoices',$fields)){
            throw new Exception('There was a problem creating an invoice.');
        }
    }

    public function delete($id)
    {
        $this->getDB()->delete('invoices', ['invoice_id', '=',$id]);
    }
    
    public function data(){
        return $this->_data;
    }
}