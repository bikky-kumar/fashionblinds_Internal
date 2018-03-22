<?php require_once("../../private/initialize.php");?>

<?php require_admin_login(); ?>
<?php $page_title = "Admin Dashboard" ; ?>
<?php require_once(SHARED_PATH .'/header.php');
?>


<div class="container">
	<div class = "page-heading">
		<h3>Admin dashboard </h3>
	</div>
	<div id= "admin_menu">
		<div class= "div_menu">
			<nav class = "nav_menu">
				<ul>
					<li><a href = "<?php echo url_for('/public/admin/add_customer.php'); ?>">Create new Customer</a> </li>
					<li><a href = "<?php echo url_for('/public/admin/add_staff.php'); ?>">Add Staff Memeber</a> </li>
					<li><a href = "<?php echo url_for('/public/admin/assign_price_table.php'); ?>">Assign Price Table</a> </li>
				</ul>
			</nav>
		</div>
		<div class = "admin_features_view">
			<?php require(PUBLIC_PATH. '/admin/search_widget.php') ?>
			<?php require(PUBLIC_PATH. '/admin/admin_widget.php') ?>
		</div>
	</div>
	<div>
		<h2> List of Customers </h2>
		<?php require(PUBLIC_PATH .'/customers/customerlist.php');?>
	</div>
	<div>
		<h2>List of staff</h2>
		<?php require(PUBLIC_PATH. '/staff/stafflist.php') ?>
	</div>
</div>

<?php 
mysqli_free_result($customer_set);
?>

<?php require_once(SHARED_PATH ."/footer.php");?>


<style>
body{padding-top:20px;}
</style>