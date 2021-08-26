<?php


namespace App\Models;


class CompanyTypeModel extends Model
{
    public $_data;


    public function find($params=null)
    {
        if($params){
            $field= (is_numeric($params)) ? 'company_type_id' : 'type';
            $data = $this->getDB()->get('company_type', array($field, '=', $params));

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
            $field= (is_numeric($params)) ? 'company_type_id' : 'type';
            $data = $this->getDB()->get('company_type', array($field, '=', $params));

            if($data->count()){
                $this->_data = $data->first();
                return true;

            }
        }
        return false;
    }
}