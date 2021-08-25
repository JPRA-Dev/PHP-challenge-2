<?php


namespace App\Helpers;


class RedirectHelper
{
    public static function to($location=null){
        if($location){
            if(is_numeric($location)){
                switch($location){
                    case 404:
                        header ('Location: /error-404');
                        exit();
                    case 500:
                        header ('Location: /error-500');
                        exit();
                }
            }

            header('Location: ' . $location);
            exit();
        }
    }
}