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


function is_post_request(){
    return $_SERVER['REQUEST_METHOD'] == 'POST';
}

function is_get_request(){
    return $_SERVER['REQUEST_METHOD'] == 'GET';
}

function current_date(){
    echo  date("Y-m-d") . "<br>";
}

function welcome(){
    if(isset($_SESSION['username'])){
        echo "Welcome: ". $_SESSION['username'];
    }
    else{
     // redirect_to('../login.php');
    }
}


function display_errors($errors=array()) {
  $output = '';
  if(!empty($errors)) {
    $output .= "<div class=\"errors\">";
    $output .= "Please fix the following errors:";
    $output .= "<ul>";
    foreach($errors as $error) {
      $output .= "<li>" . h($error) . "</li>";
    }
    $output .= "</ul>";
    $output .= "</div>";
  }
  return $output;
}

//preventing SQL injection
function db_escape($connection, $string){
    return mysqli_real_escape_string($connection, $string);
}


function find_status($value){
    if ($value == 1){$status = 'Quoted';}
    elseif($value == 0){$status = 'Ordered';}
    elseif($value == 2){$status = 'in Process';}
    return  $status; 
}



?>