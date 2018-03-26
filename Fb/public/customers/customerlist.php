<?php require_once("../../private/initialize.php"); ?>
<?php require_any_login(); ?>



<?php

$query_id = isset($_GET['query_id']) ? $_GET['query_id'] : ''; 
$customer_set = find_all_customers();

if(!admin_logged_in()){

    $Staff_id = $_SESSION['staff_id'];
  
    if(($query_id  == '1')||($query_id  == '2')||($query_id  == '4')||($query_id  == '12')){
        $customer_set = change_interval($query_id, $Staff_id) ;      
    }

    if($query_id == 'Default'){
        $customer_set = find_customers($Staff_id);         
	}
	if(($query_id  == '20')||($query_id  == '21')||($query_id  == '22')){
        $customer_set = change_by_Status($query_id, $Staff_id);      
    }


}
else{
    
    if(($query_id == '1')||($query_id == '2')||($query_id == '4')||($query_id == '12')){
        $customer_set = list_interval_for_admin($query_id) ;      
    }
    
    if($query_id == 'Default'){
        $customer_set = find_all_customers();        
    }
    if(($query_id == '20')||($query_id == '21')||($query_id == '22')){
       $customer_set = list_Status_for_admin($query_id)  ;   
    }
}




?>

<div id = "cusotmer-list">
<table class = "list">
<tr>
<th>ID</th>
<th>full Name</th>
<th>Email</th>
<th>Phone</th>
<th>Address</th>
<th>Contact Date</th>
<th>status</th>
<th>Completed Date</th>
<th>source</th>
<th>Assigned To</th>
<th>comment</th>
<th>&nbsp;</th>
<th>&nbsp;</th>
<th>&nbsp;</th>
</tr>

<?php while($customer = mysqli_fetch_assoc($customer_set)){ ?>

<?php 
$status = find_status($customer['status']);
?>

<tr>
<td><?php echo h($customer['customer_id'])?></td>
<td><?php echo h($customer['full_name'])?></td>
<td><?php echo h($customer['email'])?></td>
<td><?php echo h($customer['phone'])?></td>
<td><?php echo h($customer['address'])?></td>
<td><?php echo h($customer['contact_date'])?></td>
<td><?php echo $status ?></td>
<td><?php echo h($customer['processed_date']) ?></td>
<td><?php echo h($customer['source'])?></td>
<td><?php echo h(find_assigned($customer['staff_id'])) ; ?></td>
<td><?php echo h($customer['comment'])?></td>
<td id = "action"><a class="action" href = "<?php echo url_for('/public/customers/show.php?id='.$customer['customer_id']) ; ?>"><img src="<?php echo url_for('public/images/view.png'); ?>" alt="View button"></a></td>
<td id = "action"><a class="action" href = "<?php echo url_for('/public/customers/edit_customer.php?id='.$customer['customer_id']) ; ?>"><img src="<?php echo url_for('public/images/edit.png'); ?>" alt="Edit button"></a></td>
<td id = "action"><a class="action" href = "<?php echo url_for('/public/customers/delete_customer.php?id='.$customer['customer_id']) ; ?>"><img src="<?php echo url_for('public/images/deleteButton.png'); ?>" alt="Delete button"></a></td>
</tr>
<?php } ?>
</table>
</div>









