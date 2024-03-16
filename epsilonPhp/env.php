<?php

// defaut: dev

// $env = 'test';
// $env = 'prod';
if(isset($env)){
    if($env == 'test'){
        // NON
    }
    elseif($env == 'prod'){
        // NON
    }
} // dev
else{
    $db = new PDO('mysql:host=localhost;dbname=pictiokrecette;charset=utf8', 'root', '');
    $url = 'http://localhost/epsilon/back/';
    // PHP 7.3.8

    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);
}

?>