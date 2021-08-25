<?php


namespace App\Helpers;


class SanitizeHelper
{

    /**
     * Escape a string with htmlentities function with ENT_QUOTES flags and UTF-8 encoding
     * @param $string
     * @return string
     */
    public static function escape($string): string
    {
        return htmlentities($string, ENT_QUOTES ,'UTF-8');
    }
}