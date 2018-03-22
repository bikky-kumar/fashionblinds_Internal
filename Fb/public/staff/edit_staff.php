<?php require_once("../../private/initialize.php"); ?>
<?php require_admin_login(); ?>

<?php

//check if id is present to edit the staff with id, if not present redirect to the admin dashboard
if(!isset($_GET['id'])){
  redirect_to(url_for('/public/admin/index.php'));
}
else{
  $id = $_GET['id'];
  $staff_set = edit_staff($id);
  while($staff = mysqli_fetch_assoc($staff_set)){
  $fullname = $staff['staff_fullname'];
  $email = $staff['staff_email'];
  $phone = $staff['staff_Phone'] ;
  $password = $staff['staff_password'] ;
}

//retrive the information from database about the customer where id  = $id  
}
//assign the id
$page_title = "Edit Staff" ;
require_once(SHARED_PATH .'/header.php');


//update querry here in if statement

if (is_post_request()){

  $staff = [];
  $staff['id'] = $id;
  $staff['fullname'] = isset($_POST['fullname']) ? $_POST['fullname'] : ''; 
  $staff['email'] = isset($_POST['email']) ? $_POST['email'] : ''; 
  $staff['phone'] = isset($_POST['phone']) ? $_POST['phone'] : ''; 
  $staff['password'] = isset($_POST['password']) ? $_POST['password'] : ''; 
 
  $result = update_staff($staff);
  if($result === true){
    echo success;
  }
  else{
    $errors = $result;
    //var_dump($errors);
  }
 

  }
  else{
  
    //redirect_to(url_for('/public/admin/index.php'));
  }
?>

<div class = "container">
<div class ="bread-crumb">
<a class="back_link" href="<?php echo return_dashboard(); ?>"> &laquo; Back to Admin</a> 
</div>

<div class = "page-heading">
	<h3>Edit Staff </h3>
</div>

<?php echo display_errors($errors); ?>

<div class="form_container">
  <form action="<?php echo url_for('public/staff/edit_staff.php?id='. h($id)); ?>" method = "post">

    <label for="id">Staff id</label>
    <input type="number" id="id" name="id" style="width:50px;color:red; font-weight: 600; padding: 10px;" value = <?php echo h($id) ?> readonly><br /><br />

    <label for="fname">Full Name</label>
    <input type="text" id="fullname" name="fullname" value="<?php echo h($fullname); ?>">

    <label for="lname">email</label>
    <input type="text" id="lname" name="email" value="<?php echo  h($email); ?>">
    
    <label for="lname">Phone</label>
    <input type="text" id="phone" name="phone" value="<?php echo  h($phone); ?>">

    <label for="password">Password</label>
    <input type="text" id = "password" name="password" value="<?php echo  h($password); ?>">

    <input type="submit" value="Update">
  </form>
</div>
</div>

<link rel="stylesheet" type="text/css" href="<?php echo url_for('public/stylesheets/add_customer_style.css'); ?>">


<?php require_once(SHARED_PATH ."/footer.php");?>



