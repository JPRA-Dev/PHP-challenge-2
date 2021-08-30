<?php


namespace App\Models;


class CompanyTypeModel extends Model
{
    public $_data;


    public function find($params=null)
    {
        if (isset($params)){
            $field= (is_numeric($params)) ? 'company_type_id' : 'type';
            $data = $this->getDB()->get('company_type', array($field, '=', $params));

            $this->_data = $data;
        } else {
            $data = $this->getDB()->get('company_type');

            $this->_data = $data;
        }
        return false;
    }

    public function findOne($params=null)
    {
        if (isset($params)){
            $field= (is_numeric($params)) ? 'company_type_id' : 'type';
            $data = $this->getDB()->get('company_type', array($field, '=', $params));

            $this->_data = $data->first();
        } else {
            $data = $this->getDB()->get('company_type');

            $this->_data = $data->first();
        }
        return false;
    }
    
    public function data(){
        return $this->_data;
    }
}