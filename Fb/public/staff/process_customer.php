<?php require_once("../../private/initialize.php");?>
<?php require_staff_login(); ?>
<?php
//check if id is present to adit the customer with id, if not present redirect to the admin dashboard
if(!isset($_GET['id'])){
  redirect_to(url_for('/public/staff/index.php'));
}
else{
  $id = $_GET['id'];
  $customer_set = edit_customer($id);
  while($customer = mysqli_fetch_assoc($customer_set)){
    $full_name = $customer['full_name'];
    $email = $customer['email'];
    $phone = $customer['phone'] ;
    $address = $customer['address'] ;
    $contact_date = $customer['contact_date'] ;
    if ($customer['status'] == 1){
      $status = 'in Process';
    }
    else{
      $status = 'completed';
    }
    $source = $customer['source'] ;
    $staff_id = $customer['staff_id'] ;
    $comment = $customer['comment'] ;
    $processed_date = $customer['processed_date'];

  }

}

//update button makes a post request to the database
if (is_post_request()){
  
  $customer= [];

  $customer['id'] = $id;
  $customer['fullname'] = isset($_POST['full_name']) ? $_POST['full_name'] : ''; 
  $customer['email'] = isset($_POST['email']) ? $_POST['email'] : ''; 
  $customer['phone'] = isset($_POST['phone']) ? $_POST['phone'] : ''; 
  $customer['address'] = isset($_POST['address']) ? $_POST['address'] : ''; 
  $customer['date'] = isset($_POST['start_date']) ? $_POST['start_date'] : ''; 
  $customer['assign'] = isset($_POST['assign']) ? $_POST['assign'] : ''; 
  $customer['status'] = isset($_POST['status']) ? $_POST['status'] : ''; 
  $customer['source'] = isset($_POST['source']) ? $_POST['source'] : ''; 
  $customer['comment'] = isset($_POST['comment']) ? $_POST['comment'] : ''; 
  $customer['processed_date'] = isset($_POST['processed_date']) ? $_POST['processed_date'] : ''; 
  $customer['staff_id'] = return_staff_id($customer['assign']);

  //update_customer($customer);
  }
  else{
  
    //redirect_to(url_for('/public/admin/index.php'));
  }


$page_title = "Customer Order Form" ;
require_once(SHARED_PATH .'/header.php');
?>

<div class = "container">
<div class ="bread-crumb">
<a class="back_link" href="<?php echo return_dashboard(); ?>"> &laquo; Back to Admin</a> 
</div>
  <div class = "page-heading">
	  <h3>Edit Customer </h3>
  </div>
  <div class="form_process_order">
    <form action="<?php echo url_for('public/staff/edit_customer.php?id='. h($id)); ?>" method = "post">   
      <div id = "process_order_div">
        <label for="id">Customer id </label>
        <input type="number" id="id" name="id" style="width:50px;color:red; font-weight: 600; padding: 10px;" value = <?php echo h($id) ?> readonly>
        <label for="full_name">Full Name</label>
        <input type="text" id="full_name" name="full_name" value="<?php echo h($full_name);?>">
        <label for="email">email</label>
        <input type="text" id="email" name="email" value= "<?php echo h($email); ?>">
        <label for="date">Processed Date</label>
        <input type="Date" id="processed_date" name="processed_date" value= "<?php echo h($processed_date) ?>">
        <label for="status">Status</label>
        <select id="status" name="status">
          <option><?php echo $status ?></option>
        <option value = '1'>Quoted</option>
        <option value = '0'>Ordered</option>
        </select><br />
        <label for="assign">Assigned</label>
        <select id="assign" name="assign">
          <option><?php echo h(find_assigned($staff_id)) ; ?></option>
        </select>
      </div>
      
      <?php require(PUBLIC_PATH .'/staff/order_table.php');?>

      <input type="submit" value="Submit">
    </form>
  </div>
</div>





<link rel="stylesheet" type="text/css" href="<?php echo url_for('public/stylesheets/add_customer_style.css'); ?>">


<?php require_once(SHARED_PATH ."/footer.php");?>


