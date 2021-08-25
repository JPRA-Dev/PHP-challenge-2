<?php


namespace App\Models;

use Exception;


class InvoiceModel extends Model
{
    public $_data;


    public function find($params=null)
    {
        if($params){
            $field= (is_numeric($params)) ? 'id' : 'nbrinvoice';
            $data = $this->getDB()->get('invoices', array($field, '=', $params));

            if($data->count()){
                $this->_data = $data;
                return true;

            }
        }
        return false;
    }

    public function findOne($params=null)
    {
        if($params){
            $field= (is_numeric($params)) ? 'id' : 'nbrinvoice';
            $data = $this->getDB()->get('invoices', array($field, '=', $params));

            if($data->count()){
                $this->_data = $data->first();
                return true;

            }
        }
        return false;
    }

    public function update($fields = array(),$id=null)
    {
        if(!$id){
            $id=$this->data()->id;
        }

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
        $this->getDB()->delete('invoices', ['id', '=',$id]);
    }
    
    public function data(){
        return $this->_data;
    }
}