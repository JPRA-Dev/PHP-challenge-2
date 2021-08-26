<?php
require_once 'includes/init.inc.php';

$user=new User();
$user->logout();

Redirect::to('index.php');