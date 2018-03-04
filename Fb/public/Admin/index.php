<?php require_once("../../private/initialize.php");?>
<?php $page_title = "Admin Dashboard" ; ?>
<?php require_once(SHARED_PATH .'/header.php');?>



<div class="container">
	<div class = "page-heading">
		<h3>Admin dashboard</h3>
	</div>

	<div id= Admin_menu>
		<nav>
			<ul>
				<li><a href = "<?php echo url_for('/public/admin/add_customer.php'); ?>">Create new Customer</a> </li>
				<li><a href = "<?php echo url_for('/public/admin/add_staff.php'); ?>">Add Staff Memeber</a> </li>
			</ul>
		</nav>
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

<?php require_once(SHARED_PATH ."/footer.php");?>


<style>
body{padding-top:20px;}
</style>