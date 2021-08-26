<?php


namespace App\Helpers;


class RedirectHelper
{
    public static function noPermission()
    {
        self::to(403);
    }

    public static function error404()
    {
        self::to(404);
    }

    public static function error500()
    {
        self::to(500);
    }

    public static function to($location=null){
        if($location){
            if(is_numeric($location)){
                switch($location){
                    case 403:
                        header ('Location: /error-permission');
                        exit();
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