
<?php require_once("../../private/initialize.php");?>
<?php 

$total_customer = count_customer();
?>



<div class = "quick_data_view">
	<table class = "widget_table">
		<tr>  
			<td><span id = "widget_name">Assigned Calls 15 Days </span></td>
			<td><span id = "new_calls"><?php echo ": ". $total_customer; ?></span></td>
		</tr>
		<tr>  
			<td><span id = "widget_name">process to complete</span></td>
			<td><span id = "new_calls">: 3</span></td>
		</tr>
		<tr>  
			<td><span id = "widget_name">Total completed Process</span></td>
			<td><span id = "new_calls"><?php echo ": ". "2"; ?></span></td>
		</tr>
		<tr>  
			<td><span id = "widget_name">Total in sales</span></td>
			<td><span id = "new_calls"><?php echo ": ". " $1700"; ?></span></td>
		</tr>
</table>
</div>




