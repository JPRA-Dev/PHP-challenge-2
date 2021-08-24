<?php
session_start();

$GLOBALS['config']= array(
    'mysql' => array(
        'host'=>'127.0.0.1',//instead of localhost, takes less time for the page to load
        'username'=>'root',
        'password'=>'',
        'dbName'=>'exo3_oop'
),
    'remember'=> array(
        'cookie_name'=>'hash',
        'cookie_expiry'=> 604800
    ), //cookie names and session storage
    'session'=> array(
        'session_name'=> 'user',
        'token_name'=>'token'
    )
);

spl_autoload_register('Autoload');

function Autoload($className){

    $path="classes/";
    $extension=".class.php";
    $fullpath= $path . $className . $extension;

    if(!file_exists($fullpath)){

        return false;
    }

    include_once $fullpath;
}
require_once 'functions/sanitize.func.php';
