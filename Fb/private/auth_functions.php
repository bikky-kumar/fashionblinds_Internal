

<?php 
//there should be a function to check if user is logged in then show the relevant page other wise redirect to login page
function log_in_admin($admin){
$_SESSION['admin_id'] = $admin['admin_id'];
$_SESSION['last_login'] = time();
$_SESSION['username'] = $admin['full_name'];
return true;
}


function log_in_staff($staff){
    $_SESSION['staff_id'] = $staff['staff_id'];
    $_SESSION['last_login'] = time();
    $_SESSION['username'] = $staff['staff_fullname'];
    return true;
}


function admin_logged_in(){
return isset($_SESSION['admin_id']);
}

function staff_logged_in(){
    return isset($_SESSION['staff_id']);
    }

function  require_admin_login(){
    if(!admin_logged_in()){
        redirect_to(url_for('public/login.php'));
    }else{
        //Do nothing 
    }
}


function  require_staff_login(){
    if(!staff_logged_in()){
        redirect_to(url_for('public/login.php'));
    }else{
        //Do nothing 
    }
}


function require_any_login(){
    if(admin_logged_in() || staff_logged_in()){
      //do nothing
    }else{
        redirect_to(url_for('public/login.php'));
    }
}



function redirect_to_dashboard(){
    if(admin_logged_in()){
        redirect_to(url_for('/public/admin/index.php'));
      }
      if(staff_logged_in()){
        redirect_to(url_for('/public/staff/index.php'));
      }
}

function return_dashboard(){
    if(admin_logged_in()){
        return url_for('/public/admin/index.php');
    }
    if(staff_logged_in()){
        return url_for('/public/staff/index.php');
    }

}


?>