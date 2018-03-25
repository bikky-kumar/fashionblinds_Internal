<?php require_once("../../private/initialize.php");?>
<?php require_staff_login(); ?>
<?php $page_title = "Staff Dashboard" ; ?>
<?php require_once(SHARED_PATH .'/header.php');
?>

<?php $customer_set = find_customers($_SESSION['staff_id']); ?>

<?php

if (is_post_request()){

	$Staff_id = $_SESSION['staff_id'];
  
  
	$query = isset($_POST['show_list_by']) ? $_POST['show_list_by'] : 'Default'; 
    if(($query == '1')||($query == '2')||($query == '4')||($query == '12')){
        $customer_set = change_interval($query, $Staff_id) ;      
    }

    if($query == 'Default'){
        $customer_set = find_customers($Staff_id);         
	}
	if(($query == '20')||($query == '21')||($query == '22')){
        $customer_set = change_by_Status($query, $Staff_id);      
    }
    
	}
	//if not a post request
    else{
    
      //redirect_to(url_for('/public/admin/index.php'));
    }
?>

<div class="container">
	<div class = "page-heading">
		<h3>Staff dashboard </h3>
	</div>
	<div id= Admin_menu>
		<div class= "div_menu">
			<nav class = "nav_menu">
				<ul>
					<li><a href = "<?php echo url_for('/public/admin/add_customer.php'); ?>">Create new customer</a> </li>
					<li><a href = "<?php //echo url_for('/public/admin/add_staff.php'); ?>">Processed customers</a> </li>
				</ul>
			</nav>
		</div>
		</div>
		<div class = "admin_features_view">
			<?php require(PUBLIC_PATH. '/admin/search_widget.php') ?>
			<?php require(PUBLIC_PATH. '/staff/staff_widget.php') ?>
		</div>
	
	<div>
		<h2>Assigned Customer</h2>
		<?php require(PUBLIC_PATH .'/staff/customerlist_staff_view.php');?>
	</div>
	<div>
		<h2>Account info</h2>
		<?php require(PUBLIC_PATH. '/staff/account_info.php') ?>
	</div>
</div>

<?php 
mysqli_free_result($customer_set);
?>

<?php require_once(SHARED_PATH ."/footer.php");?>


<style>
body{padding-top:20px;}
</style>