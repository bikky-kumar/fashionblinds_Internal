<?php

ob_start(); // output buffering is turned ;it gives me a cotainer to play aroud with data to be dumped before to the frontend

define("PRIVATE_PATH", dirname(__FILE__));
define("PROJECT_PATH", dirname(PRIVATE_PATH));
define("PUBLIC_PATH", PROJECT_PATH . '/public');
define("SHARED_PATH", PRIVATE_PATH. '/shared');

$public_end = strpos($_SERVER['SCRIPT_NAME'], '/public') ;
$doc_root = substr($_SERVER['SCRIPT_NAME'], 0, $public_end);
define("WWW_ROOT", $doc_root); 


    require_once('functions.php');
    require_once('database.php');
    require_once('query_function.php');

    $db = db_connect();

 
?>