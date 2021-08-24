<?php
class Config {
    public static function get($path=null){
        if($path){
            $config=$GLOBALS['config'];
            $path=explode('/',$path); /*gives an array back*/

            foreach($path as $bit){
                if(isset($config[$bit])){
                        $config=$config[$bit];
                } //loop through the broken up pieces
            } 
            return $config;          
        }
        return false;
    }
}
