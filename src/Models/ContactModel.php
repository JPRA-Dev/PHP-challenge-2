<?php


namespace App\Models;

use Exception;


class ContactModel extends Model
{
    public $_data;


    public function find($params=null)
    {
        if($params){
            $field= (is_numeric($params)) ? 'id' : 'lastname';
            $data = $this->getDB()->get('contact_person', array($field, '=', $params));

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
            $field= (is_numeric($params)) ? 'id' : 'lastname';
            $data = $this->getDB()->get('contact_person', array($field, '=', $params));

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

        if(!$this->getDB()->update('contact_person',$id,$fields)){
            throw new Exception('There was a problem updating.');
        }
    }

    public function create($fields = array())
    {
        if(!$this->getDB()->insert('contact_person',$fields)){
            throw new Exception('There was a problem creating a contact.');
        }
    }

    public function delete($id)
    {
        $this->getDB()->delete('contact_person', ['id', '=',$id]);
    }
    
    public function data(){
        return $this->_data;
    }
}