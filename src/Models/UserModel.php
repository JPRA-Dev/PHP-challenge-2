<?php


namespace App\Models;


use App\Helpers\ConfigHelper;
use App\Helpers\CookieHelper;
use App\Helpers\HashHelper;
use App\Helpers\SessionHelper;
use Exception;

class UserModel extends Model
{
    private
        $_data,
        $_sessionName,
        $_cookieName,
        $isloggedIn;

    public function __construct($user=null) {
        $this->_sessionName = ConfigHelper::get('session/session_name');
        $this->_cookieName = ConfigHelper::get('remember/cookie_name');

        if(!$user){
            if(SessionHelper::exists($this->_sessionName)){
                $user= SessionHelper::get($this->_sessionName);
                if($this->find($user)){
                    $this->isloggedIn = true;
                }
            }
        }else{
            $this->find($user);
        }
    }

    public function update($fields = array(),$id=null){

        if(!$id && $this->isloggedIn()){
            $id=$this->data()->id;
        }

        if(!$this->getDB()->update('users',$id,$fields)){
            throw new Exception('There was a problem updating.');
        }
    }

    public function create($fields=array()){
        if(!$this->getDB()->insert('users',$fields)){
            throw new Exception('There was a problem creating an account');
        }

    }

    public function find($params=null)
    {
        if (isset($params)){
            $field= (is_numeric($params)) ? 'id' : 'username';
            $data = $this->getDB()->getWithJointure('users',"LEFT JOIN users_group ON users.group=users_group.id",array($field, '=', $params));

            $this->_data = $data;
            if ($data)
                return true;
        } else {
            $data = $this->getDB()->getWithJointure('users',"LEFT JOIN users_group ON users.group=users_group.id");

            $this->_data = $data;
            if ($data)
                return true;
        }

        return false;
    }

    public function login($username=null,$password=null,$remember=false): bool
    {
        if(!$username && !$password &&$this->exists()){
            SessionHelper::put($this->_sessionName,$this->data()->id);

        } else {
            $user=$this->find($username);
            
            if($user){
                $this->_data=$this->_data[0];
                if(password_verify($password, $this->data()->pwd)){
                    SessionHelper::put($this->_sessionName,$this->data()->id);
                    if($remember){
                        $hash=HashHelper::unique();
                        $hashCheck = $this->getDB()->get('users_session',array('user_id', '=',$this->data()->id));

                        if(!$hashCheck->count()){
                            $this->getDB()->insert ('users_session',array(
                                'user_id'=>$this->data()->id,
                                'hash'=>$hash
                            ));
                        }else{
                            $hash = $hashCheck->first()->hash;
                        }

                        CookieHelper::put($this->_cookieName,$hash,ConfigHelper::get('remember/cookie_expiry'));

                    }

                    return true;
                }

            }
            return false;
        }
    }

    public function hasPermission($key): bool
    {
        $group = $this->getDB()->get('groups', array('id','=', $this->data()->group));
        if($group->count()){
            $permissions=json_decode($group->first()->permissions, true);

            if($permissions[$key]== true){
                return true;
            }
        }
        return false;
    }

    public function userHasPermission($usergroup, $key): bool
    {
        $group = $this->getDB()->get('users_group',array('id','=',$usergroup));
        if($group) {
            if (!isset($group[0]) || !isset($group[0]->permissions))
                return true;

            $permissions= json_decode($group[0]->permissions,true);

            if(isset($permissions[$key]) && $permissions[$key]== true){
                return true;
            }
        }
        return false;
    }

    public function exists(): bool
    {
        return !empty($this->data);
    }

    public function logout(){

        $this->getDB()->delete('user_session',array('user_id', '=',$this->data()->id));
        SessionHelper::delete($this->_sessionName);
        CookieHelper::delete($this->_cookieName);
    }

    public function data(){
        return $this->_data;
    }

    public function isLoggedIn(): bool
    {
        return $this->isloggedIn;
    }
}