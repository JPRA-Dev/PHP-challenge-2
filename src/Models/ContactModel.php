<?php


namespace App\Models;

use Exception;


class ContactModel extends Model
{
    public $_data;


    public function find($params=null)
    {
        if (isset($params)){
            $field= (is_numeric($params)) ? 'contact_person_id' : 'lastname';
            $data = $this->getDB()->getWithJointure('contact_person', "LEFT JOIN company ON company.id=contact_person.company_id",array($field, '=', $params));

            $this->_data = $data;
        } else {
            $data = $this->getDB()->getWithJointure('contact_person', "LEFT JOIN company ON company.id=contact_person.company_id");

            $this->_data = $data;
        }
    }

    public function findLimit(int $limit)
    {
        $this->_data = $this->getDB()->action(
            'SELECT *',
            'contact_person',
            null,
            "LEFT JOIN company ON company.id=contact_person.company_id",
            $limit,
            "ORDER BY contact_person_id DESC"
        );
    }

    public function findOne($params=null): bool
    {
        if($params){
            $field= (is_numeric($params)) ? 'contact_person_id' : 'name';
            $data = $this->getDB()->getWithJointure('contact_person', "LEFT JOIN company ON company.id=contact_person.company_id", array($field, '=', $params));

            $this->_data = $data->first();
            return true;
        }
        return false;
    }

    public function update($fields = array(),$id=array())
    {
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
        $this->getDB()->delete('contact_person', ['contact_person_id', '=',$id]);
    }
    
    public function data(){
        return $this->_data;
    }
}