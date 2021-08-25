<?php


namespace App\Helpers;


class SessionHelper
{

    /**
     * Check if a value $name exist on the session
     * @param $name
     * @return bool
     */
    public static function exists($name): bool
    {
        return isset($_SESSION[$name]);
    }

    /**
     * Put a value in the session
     * @param $name
     * @param $value
     * @return mixed
     */
    public static function put($name,$value)
    {
        return $_SESSION[$name] = $value;
    }

    /**
     * Get a value in the session
     * @param $name
     * @return mixed
     */
    public static function get($name)
    {
        return $_SESSION[$name];
    }

    /**
     * Delete a value in the session
     * @param $name
     */
    public static function delete($name)
    {
        if(self::exists($name)){
            unset($_SESSION[$name]);
        }
    }

    /**
     * Flash session for alert message
     * @param $name
     * @param string $string
     * @return mixed
     */
    public static function flash($name, string $string='')
    {
        if(self::exists($name)){
            $session=self::get($name);
            self::delete($name);
            return $session;
        } else {
            self::put($name,$string);
        }
    }
}