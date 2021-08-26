<?php
 //security procedure
class Hash{
    public static function make($string){
        return password_hash($string,PASSWORD_BCRYPT);
    }

   /* public static function salt($length){
        return password_hash($length);

    }*/

    public static function unique(){
        return self::make(uniqid());

    }
}