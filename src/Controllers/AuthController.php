<?php

namespace App\Controllers;

use App\Helpers\InputHelper;
use App\Helpers\RedirectHelper;
use App\Helpers\TokenHelper;
use App\Helpers\ValidatorHelper;
use App\Models\UserModel;

class AuthController extends Controller
{
    public function logout(){
        $user=new UserModel();
        $user->logout();

        RedirectHelper::to('/');
    }

    public function login()
    {
        if(InputHelper::exists()){
            if(TokenHelper::check(InputHelper::get('token'))){
        
        
                $validate = new ValidatorHelper();
                $validation=$validate->check($_POST,array(
                    'username'=>array('required'=>true),
                    'password'=>array('required'=>true)
                ));
                if($validation->_passed){
                    $user=new UserModel();
                    $remember=(InputHelper::get('remember')==='on') ?true:false;
                    $login=$user->login(InputHelper::get('username'),InputHelper::get('password',$remember));
        
                    if($login){
                        RedirectHelper::to('/');
                    }else{
                        echo '<p> Sorry, Log in failed!</p>';
                    }
                }else{
                    foreach($validation->errors() as $error){
                        echo $error,'<br>';
                    }
                }
            }
        }
        
        $this->render("login");
    }
}