<?php 

function url_for($script_path){
    if($script_path[0] != '/'){
        $script_path = "/" . $script_path;
    }
    return WWW_ROOT . $script_path;
}

function h($string=""){
    return htmlspecialchars($string);
}

function error_404(){

    header($_SERVER["SERVER_PROTOCOL"]. "404 Not Found");
    exit();
}

function error_500(){
    header($_SERVER["SERVER_PROTOCOL"]. "500 Internal Sever Error");
    exit();
}

function redirect_to($location){
	header("Location: ".$location);
	exit;
}

?>