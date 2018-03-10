<?php 
function find_all_customers(){
    //make sure when concatenation $sql .= / there is a space at the end of select statement
    global $db;
    $sql = "SELECT * FROM customers ";
    $sql .= "ORDER BY full_name ASC";
    $customer_result = mysqli_query($db, $sql);
    confirm_result_set($customer_result);
    return $customer_result;
}


function find_all_staff(){
    global $db;
    $sql = "SELECT * FROM staff ";
    $sql .= "ORDER BY staff_fullname ASC";
    $staff_result = mysqli_query($db, $sql);
    confirm_result_set($staff_result);
    return $staff_result;
}

function find_assigned($querried_staff_id){
    global $db;
    $sql = "SELECT staff_fullname FROM staff WHERE staff_id = '$querried_staff_id' limit 1";
    $staff_result = mysqli_query($db, $sql);
    confirm_result_set($staff_result);
    $value = mysqli_fetch_assoc($staff_result);
    return $value['staff_fullname'];
}


function return_staff_id($querried_staff_fullname){
    global $db;
    $sql = "SELECT staff_id FROM staff WHERE staff_fullname = '$querried_staff_fullname' limit 1";
    $staff_result = mysqli_query($db, $sql);
    confirm_result_set($staff_result);
    $value = mysqli_fetch_assoc($staff_result);
    return $value['staff_id'];
}


function edit_staff($id){
    global $db;
    $sql = "SELECT * FROM staff WHERE staff_id ='$id'";
    $staff_result = mysqli_query($db, $sql);
    confirm_result_set($staff_result);
    return $staff_result;
}

function edit_customer($id){
    global $db;
    $sql = "SELECT * FROM customers WHERE customer_id ='$id'";
    $customer_result = mysqli_query($db, $sql);
    confirm_result_set($customer_result);
    return $customer_result;
}




?>
