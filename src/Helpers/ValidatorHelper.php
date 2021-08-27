<?php


namespace App\Helpers;

use App\Database\Database;

class ValidatorHelper
{
    public $db = null;
    public array $_errors= array();
    public bool $_passed= false;

    public function __construct(){
        $this->db=Database::getInstance();
    }

    public function check($source, $items = array()): ValidatorHelper
    {
        foreach($items as $item => $rules){
            foreach($rules as $rule =>$rule_value){

                $value = trim($source[$item]);

                if($rule==='required' && empty($value)){
                    $this->addError("{$item} is required");
                }else if(!empty($value)){
                    switch($rule){
                        case 'min':
                            if(strlen($value) < $rule_value){
                                $this->addError("{$item} must be a minimum of {$rule_value} characters.");
                            }
                            break;
                        case 'max':
                            if(strlen($value) > $rule_value){
                                $this->addError("{$item} must be a maximum of {$rule_value} characters.");
                            }
                            break;
                        case 'matches':
                            if($value != $source[$rule_value]){
                                $this->addError(("{$rule_value} must match {$item}."));
                            }
                            break;
                        case 'unique':
                            $check = $this->db->get($rule_value, array($item, '=', $value));
                            if($check->count()){
                                $this->addError("{$item} already exists.");
                            }
                            break;
                    }
                }
            }
        }
        if(empty($this->_errors)){
            $this->_passed = true;
        }

        return $this;
    }

    private function addError($error){
        $this->_errors[] = $error;
    }

    public function errors(): array
    {
        return $this->_errors;
    }

    public function passed(): bool
    {
        return $this->_passed;
    }
}