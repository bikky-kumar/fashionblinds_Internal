
<?php require_once("../../private/initialize.php");?>
<?php 

$total_customer = count_customer();
?>



<div class = "quick_data_view">
		<div>New Calls This week : <span id = "new_calls"><?php echo $total_customer; ?> </span></div>
		<div>process completed : 3 </div>
		<div>Total Sales : $400 </div>	
</div>