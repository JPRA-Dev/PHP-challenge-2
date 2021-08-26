<?php


namespace App\Helpers;


class TokenHelper
{
    public static function generate(){
        return SessionHelper::put(ConfigHelper::get('session/token_name'),md5(uniqid()));
    }

    public static function check($token){
        $tokenName = ConfigHelper::get('session/token_name');

        if(SessionHelper::exists($tokenName) && $token === SessionHelper::get($tokenName)) {
            SessionHelper::delete($tokenName);
            return true;
        }

        return false;
    }
}