<?php


namespace App\Helpers;


class HashHelper
{
    /**
     * Hash a string with PASSWORD_BCRYPT
     * @param $string
     * @return false|string|null
     */
    public static function make($string){
        return password_hash($string, PASSWORD_BCRYPT);
    }

    /**
     * Verify if is correct
     * @param $noHashed
     * @param $hashed
     * @return bool
     */
    public static function verify($noHashed, $hashed): bool
    {
        return password_verify($noHashed, $hashed);
    }

    /**
     * Create a unique random hash
     * @return false|string|null
     */
    public static function unique(){
        return self::make(uniqid());
    }
}