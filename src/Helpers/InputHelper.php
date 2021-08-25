<?php


namespace App\Helpers;


class InputHelper
{
    public static function exists($type='post'): bool
    {
        switch($type){
            case'post':
                return !empty($_POST);
            case'get':
                return !empty($_GET);
            default:
                return false;
        }

    }
    public static function get($item){
        if(isset($_POST[$item])){
            return $_POST[$item];
        }else if(isset($_GET[$item])){
            return $_GET[$item];
        }
        return '';
    }
}