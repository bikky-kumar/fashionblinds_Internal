<?php 


function insert_customers($fullname, $email, $phone, $address, $date, $status, $source, $staff_id, $comment){
  global $db;
  $sql = "INSERT INTO customers ";
  $sql .= "(full_name, email, phone, address, contact_date, status, source, staff_id, comment) "; 
  $sql .= "VALUES (";
  $sql .= "'" . db_escape($db, $fullname). "',";
  $sql .= "'" . db_escape($db, $email). "',";
  $sql .= "'" . db_escape($db, $phone). "',";
  $sql .= "'" . db_escape($db, $address). "',";
  $sql .= "'" . db_escape($db, $date). "',";
  $sql .= "'" . db_escape($db, $status). "',";
  $sql .= "'" . db_escape($db, $source). "',";
  $sql .= "'" . db_escape($db, $staff_id). "',";
  $sql .= "'" . db_escape($db, $comment). "'";
  $sql .= ")";

  //for INSERT Statement - this will return true or false if query successful
  $result = mysqli_query($db, $sql);

  //if true
  if($result){
    redirect_to_dashboard();
  }else{
    error_msg();
  }


}


function insert_staff($fullname, $email, $phone, $password){
  global $db;

  $sql = "INSERT INTO staff ";
  $sql .= "(staff_fullname, staff_Phone, staff_email, staff_password) "; 
  $sql .= "VALUES (";
  $sql .= "'" . db_escape($db, $fullname). "',";
  $sql .= "'" . db_escape($db, $phone). "',";
  $sql .= "'" . db_escape($db, $email). "',";
  $sql .= "'" . db_escape($db, $password). "'";
  $sql .= ")";

  //for INSERT Statement - this will return true or false if query successful
  $result = mysqli_query($db, $sql);
  if($result){
    redirect_to_dashboard();
  }else{
    error_msg();
  }  
}


function update_staff($staff){
   global $db;

   $errors = validate_staff($staff);

   if(!empty($errors)){
        return $errors;
   }
   else{
        $sql = "UPDATE staff SET ";
        $sql .= "staff_fullname ='" . $staff['fullname']. "',";
        $sql .= "staff_Phone = '" . $staff['phone']. "',";
        $sql .= "staff_email = '" . $staff['email']. "',";
        $sql .= "staff_password ='" . $staff['password']. "'";
        $sql .= "WHERE staff_id = '". db_escape($db, $staff['id']). "'";
          //for INSERT Statement - this will return true or false if query successful
        $result = mysqli_query($db, $sql);
        if($result){
            redirect_to(url_for('/public/admin/index.php'));
        }else{
            error_msg();
        }
    } 
}

function update_customer($customer){
  global $db;
  $sql = "UPDATE customers SET ";
  $sql .= "full_name ='" . $customer['fullname']. "',";
  $sql .= "email = '" . $customer['email']. "',";
  $sql .= "phone = '" . $customer['phone']. "',";
  $sql .= "address = '" . $customer['address']. "',";
  $sql .= "contact_date = '" . $customer['date']. "',";
  $sql .= "status = '" . $customer['status']. "',";
  $sql .= "source = '" . $customer['source']. "',";
  $sql .= "staff_id = '" . $customer['staff_id']. "',";
  $sql .= "comment ='" . $customer['comment']. "',";
   $sql .= "processed_date ='" . $customer['processed_date']. "'";
  $sql .= "WHERE customer_id = '". db_escape($db, $customer['id']). "'";

  //for INSERT Statement - this will return true or false if query successful
  $result = mysqli_query($db, $sql);
  if($result){
    redirect_to_dashboard();
    }else{
    error_msg();
  } 
}

function find_all_customers(){
    //make sure when concatenation $sql .= / there is a space at the end of select statement
    global $db;
    $sql = "SELECT * FROM customers ";
    $sql .= "ORDER BY contact_date DESC limit 20";
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
    $sql = "SELECT staff_fullname FROM staff ";
    $sql .= "WHERE staff_id = '". db_escape($db, $querried_staff_id). "'";
    $sql .= "limit 1";
    $staff_result = mysqli_query($db, $sql);
    confirm_result_set($staff_result);
    $value = mysqli_fetch_assoc($staff_result);
    return $value['staff_fullname'];
}


function return_staff_id($querried_staff_fullname){
    global $db;
    $sql = "SELECT staff_id FROM staff "; 
    $sql .= "WHERE staff_fullname = '". db_escape($db, $querried_staff_fullname). "'";
    $sql .= " limit 1";
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

function delete_customer($id){
    global $db;
    $sql = "DELETE FROM customers WHERE customer_id ='$id'";
    $customer_result = mysqli_query($db, $sql);
    confirm_result_set($customer_result);
    if($customer_result){
        redirect_to(url_for('/public/admin/index.php'));
    }else{
        error_msg();
    }
}

function delete_staff($id){
    global $db;
    $sql = "DELETE FROM staff WHERE staff_id ='$id'";
    $staff_result = mysqli_query($db, $sql);
    confirm_result_set($staff_result);
    if($staff_result){
        redirect_to(url_for('/public/admin/index.php'));
    }else{
        error_msg();
    }
}


function count_customer(){
    global $db;

    $sql = "SELECT * FROM customers WHERE contact_date >= DATE(NOW()) - INTERVAL 1 WEEK";
    $customer_result = mysqli_query($db, $sql);
    confirm_result_set($customer_result);
    $value = mysqli_num_rows($customer_result);
    return $value;
}


function validate_staff($staff){
    $errors = [];
    $email_regex = '/\A[A-Z0-9._%+-]+@[A-Z0-9.-]+\.[A-z]{2,}\Z/i';
    if(empty($staff['fullname'])){
        $errors['name_error'] = "staff name cannot be blank. ";
    }

    if(!preg_match($email_regex , $staff['email'])){
      $errors['email_error'] = "please type a valid email address";
    }


    if(empty($staff['password'])){
        $errors['password_errror'] = "staff password cannot be blank. ";
    }

    return $errors;
}


function verify_admin($username, $password){
    global $db;
    $sql = "SELECT * FROM admins ";
    $sql .= "WHERE admin_email = '". db_escape($db, $username). "'";
    $sql .= "AND admin_password = '". db_escape($db, $password). "'";
    $admin_result = mysqli_query($db, $sql);
    confirm_result_set($admin_result);
    $value = mysqli_fetch_assoc($admin_result);
    return $value; 
}

function verify_staff($username, $password){
    global $db;
    $sql = "SELECT * FROM staff "; 
    $sql .= "WHERE staff_email = '". db_escape($db, $username). "'";
    $sql .= "AND staff_password = '". db_escape($db, $password). "'";
    $staff_result = mysqli_query($db, $sql);
    confirm_result_set($staff_result);
    $value = mysqli_fetch_assoc($staff_result);
    return $value;
}


function find_customers($staff_id){
    //make sure when concatenation $sql .= / there is a space at the end of select statement
    global $db;
    $sql = "SELECT * FROM customers ";
    $sql .= "WHERE staff_id = '". db_escape($db, $staff_id). "'";
    $sql .= "ORDER BY contact_date DESC limit 20";
    $customer_result = mysqli_query($db, $sql);
    confirm_result_set($customer_result);
    return $customer_result;
}

function find_my_account($staff_id){
    //make sure when concatenation $sql .= / there is a space at the end of select statement
    global $db;
    $sql = "SELECT * FROM staff ";
    $sql .= "WHERE staff_id = '". db_escape($db, $staff_id). "'";
    $sql .= "limit 1";
    $staff_result = mysqli_query($db, $sql);
    confirm_result_set($staff_result);
    return $staff_result;
}




function error_msg(){
    global $db;
    echo mysqli_error($db);
    db_disconnect($db);
    exit;
}


function change_interval($query, $staff_id){
    global $db;

    $sql = "SELECT * FROM customers ";
    $sql .= "WHERE staff_id = '". db_escape($db, $staff_id). "'";
    $sql .= " AND contact_date >= DATE(NOW()) - INTERVAL $query WEEK";
    $customer_result = mysqli_query($db, $sql);
    confirm_result_set($customer_result);
    return $customer_result;
    
}

function change_by_Status($query, $staff_id){
    global $db;
    $status = $query-20;
    $sql = "SELECT * FROM customers ";
    $sql .= "WHERE staff_id = '". db_escape($db, $staff_id). "'";
    $sql .= "AND status = '". db_escape($db, $status). "'";
    $customer_result = mysqli_query($db, $sql);
    confirm_result_set($customer_result);
    return $customer_result;
    
}


function product_list(){
    global $db;
    $sql = "SELECT * FROM product_type";
    $product_result = mysqli_query($db, $sql);
    confirm_result_set($product_result);
    return $product_result;
}


function product_type_list(){
    global $db;
    $sql = "SELECT * FROM product_subtype";
   // $sql .= "WHERE product_id = '". db_escape($db, $product_id). "'";
    $product_result = mysqli_query($db, $sql);
    confirm_result_set($product_result);
    return $product_result;
}

function find_product_type($product_subtype){
    global $db;
    $sql = "SELECT product_subtype_id FROM product_subtype ";
    $sql .= "WHERE product_subtype = '". db_escape($db, $product_subtype). "'";
    $product_result = mysqli_query($db, $sql);
    confirm_result_set($product_result);
    $value = mysqli_fetch_assoc($product_result);
    return $value['product_subtype_id'];
}

function insert_price_table($width, $height, $price , $product_info){
  global $db;
  for($i = 0; $i < sizeof($width); $i++){
  
  $sql = "INSERT INTO price_table";
  $sql .= "(width, height, price, unit, product_id, product_type_id) "; 
  $sql .= " VALUES (";
  $sql .= "'" . db_escape($db, $width[$i]). "',";
  $sql .= "'" . db_escape($db, $height[$i]). "',";
  $sql .= "'" . db_escape($db, $price[$i]). "',";
  $sql .= "'" . db_escape($db, $product_info['measurement_drop']). "',";
  $sql .= "'" . db_escape($db, $product_info['product_id']). "',";
  $sql .= "'" . db_escape($db, $product_info['product_type_id']). "'";
  $sql .= ")";  

  $result = mysqli_query($db, $sql);

  }
  
  //if true
  if($result){
    //redirect_to_dashboard();
  }else{
    error_msg();
  }
  
  
}




?>
