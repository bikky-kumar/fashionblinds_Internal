
<?php require_once("../../private/initialize.php");?>
<?php 

$total_customer = count_customer();
?>



<div class = "quick_data_view">
	<table class = "widget_table">
		<tr>  
			<td><span id = "widget_name">New Calls This week </span></td>
			<td><span id = "new_calls"><?php echo ": ". $total_customer; ?></span></td>
		</tr>
		<tr>  
			<td><span id = "widget_name">process completed </span></td>
			<td><span id = "new_calls">: 3</span></td>
		</tr>
		<tr>  
			<td><span id = "widget_name">revenue from Facebook </span></td>
			<td><span id = "new_calls"><?php echo ": ". "$2300"; ?></span></td>
		</tr>
		<tr>  
			<td><span id = "widget_name">revenue from Google </span></td>
			<td><span id = "new_calls"><?php echo ": ". " $1700"; ?></span></td>
		</tr>
</table>
</div>