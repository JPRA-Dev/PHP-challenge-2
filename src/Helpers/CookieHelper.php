<?php


namespace App\Helpers;


class CookieHelper
{

    /**
     * Check if cookie exist
     * @param $name
     * @return bool
     */
    public static function exists($name): bool
    {
        return isset($_COOKIE[$name]);
    }

    /**
     * Get a cookie
     * @param $name
     * @return mixed
     */
    public static function get($name){
        return $_COOKIE[$name];
    }

    /**
     * Add a cookie
     * @param $name
     * @param $value
     * @param $expiry
     * @return bool
     */
    public static function put($name,$value,$expiry): bool
    {
        if(setcookie($name,$value,time() + $expiry,'/')){
            return true;
        }
        return false;
    }

    /**
     * Delete a cookie
     * @param $name
     */
    public static function delete($name){
        self::put($name,'', time()- 1);
    }
}