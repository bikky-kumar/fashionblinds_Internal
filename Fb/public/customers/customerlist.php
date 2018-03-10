<?php require_once("../../private/initialize.php"); ?>

<?php
//$db is connection and $sql is query
$customer_set = find_all_customers();
?>

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

    if ($customer['status'] == 1){$status = 'in Process';}
    else{$status = 'completed';}
    

?>

<tr>
<td><?php echo h($customer['customer_id'])?></td>
<td><?php echo h($customer['full_name'])?></td>
<td><?php echo h($customer['email'])?></td>
<td><?php echo h($customer['phone'])?></td>
<td><?php echo h($customer['address'])?></td>
<td><?php echo h($customer['contact_date'])?></td>
<td><?php echo $status ?></td>
<td><?php echo "From orders table" ?></td>
<td><?php echo h($customer['source'])?></td>
<td><?php echo h(find_assigned($customer['staff_id'])) ; ?></td>
<td><?php echo h($customer['comment'])?></td>
<td><a class="action" href = "<?php echo url_for('/public/customers/show.php?id='.$customer['customer_id']) ; ?>">VIEW </a></td>
<td><a class="action" href = "<?php echo url_for('/public/customers/edit_customer.php?id='.$customer['customer_id']) ; ?>">EDIT</a></td>
<td><a class="action" href = "">DELETE </a></td>
</tr>
<?php } ?>
</table>
