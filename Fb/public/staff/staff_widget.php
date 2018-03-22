
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

<div id = "change_list"> 
<form action="<?php echo url_for('public/staff/index.php')?>" method = "post">
<label for="show_list">Show Customer</label>
    <select id="show_list_by" name="show_list_by">
	<option value = "Default">Default</option>
    <option value = "1">Last 7 Days</option>
    <option value = "2">Last 14 Days</option>
    <option value = "4">This Month</option>
    <option value = "12">Last 3 Months</option>
    <option value = "20">Ordered</option>
    <option value = "21">Quoted</option>
    <option value = "22">In Process</option>
    </select>
    <input type="submit" value="Update">
 </form>   
</div>



