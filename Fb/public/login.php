<?php
//dont show the page if already logged in

if(isset($_SESSION['username'])){
	redirect_to('public/Admin/index.php');
}
?>

<?php require_once("../private/initialize.php");?>
<?php $page_title = "User Login" ; ?>

<?php
$errors = [];
$username = '';
$password = '';
$role = '';

if(is_post_request()){

	$username = isset($_POST['email']) ? $_POST['email'] : ''; 
	$password = isset($_POST['password']) ? $_POST['password'] : '';
	$role = isset($_POST['user_role']) ? $_POST['user_role'] : '';

	//check if any feild is blank
	if(empty($username)){
		$errors[] = "usernamer cannot be blank";
	}
	if(empty($password)){
		$errors[] = "password cannot be blank";
	}
	if($role == "None"){
		$errors[] = "please select a role";
	}
	
	//if no errors process username and password
	if(empty($errors)){
		if($role == "Admin"){
			$admin = verify_admin($username, $password);
			if($admin){
					//everything is okay
					log_in_admin($admin);
					redirect_to(url_for('public/admin/index.php'));
			}
			else{
				$errors[] = "login Failed";
			}
	
		}
		if($role == "Staff"){
			$staff = verify_staff($username, $password);
			if($staff){
				//everything is okay
				log_in_staff($staff);
				redirect_to(url_for('public/staff/index.php'));
			}
			else{
				$errors[] = "login Failed";
			}
		}



	}

	
}

require_once(SHARED_PATH .'/header.php');
?>

<div class="container">
    <div class="row">
		<div class="col-md-4 col-md-offset-4">
    		<div class="panel panel-default">
			  	<div class="panel-heading">
			    	<h3 class="panel-title">Please sign in</h3>
			 	</div>
			  	<div class="panel-body">
				  <?php echo display_errors($errors); ?>
			    	<form action = "<?php echo url_for('public/login.php'); ?>" accept-charset="UTF-8" method = "post">
                    <fieldset>
			    	  	<div class="form-group">
			    		    <input class="form-control" placeholder="E-mail" name="email" type="text">
			    		</div>
			    		<div class="form-group">
			    			<input class="form-control" placeholder="Password" name="password" type="password" value="">
			    		</div>
			    		<div class= "user_role" name = "user_role">
    						<select id="user_role" name="user_role">
    							<option>None</option>
								<option>Admin</option>
    							<option>Staff</option>
   							</select>
			    	    </div>
			    		<input class="btn btn-lg btn-success btn-block" type="submit" value="Login">
			    	</fieldset>
			      	</form>
			    </div>
			</div>
		</div>
	</div>
</div>

<?php require_once(SHARED_PATH ."/footer.php");?>


<style>
body{padding-top:20px;}
</style>

<link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
