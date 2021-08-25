<?php


namespace App\Models;

use App\Helpers\ConfigHelper;
use Exception;

class CompanyModel extends Model
{
    public $_data;


    public function find($params=null)
    {
        if($params){
            $field= (is_numeric($params)) ? 'id' : 'name';
            $data = $this->getDB()->get('company', array($field, '=', $params));

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
            $field= (is_numeric($params)) ? 'id' : 'name';
            $data = $this->getDB()->get('company', array($field, '=', $params));

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

        if(!$this->getDB()->update('company',$id,$fields)){
            throw new Exception('There was a problem updating.');
        }
    }

    public function create($fields = array())
    {
        if(!$this->getDB()->insert('company',$fields)){
            throw new Exception('There was a problem creating a company.');
        }
    }

    public function delete($id)
    {
        $this->getDB()->delete('company', ['id', '=',$id]);
    }
    
    public function data(){
        return $this->_data;
    }
}