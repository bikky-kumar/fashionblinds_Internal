<?php
require_once('db_credentials.php');

//databse connection
function db_connect(){
    $connection = mysqli_connect(DB_SERVER, DB_USER, DB_PASS, DB_NAME);
    //check connection
    confirm_db_connect();
    return $connection;
}


//databse disconnect
function db_disconnect(){
    if(isset($connection)){
        mysqli_close($connection);
    }
}

function confirm_db_connect(){
    if(mysqli_connect_errno()){
        $msg = "Database connection failed: ";
        $msg .= mysqli_connect_error();
        $msg .= " (" . mysqli_connect_error() . ")"; 
        exit($msg);
    }
}

function confirm_result_set($result_set){
    if(!$result_set){
        exit("Databse query failed");
    }
}





?>