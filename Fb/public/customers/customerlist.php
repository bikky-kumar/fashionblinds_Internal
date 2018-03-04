<?php

  $customers = [
    ['c_id' => '1', 'c_email' => 'xyz@gmail.com', 'c_phone' => '930333', 'c_name' => 'About Globe', 'c_adress' => 'About Globe Bank', 'assigned' => 'Marta Joyce'],
    ['c_id' => '2', 'c_email' => 'xyz@gmail.com', 'c_phone' => '378383', 'c_name' => 'Consumer', 'c_adress' => 'About Globe Bank', 'assigned' => 'Bikky kumar'],
    ['c_id' => '3', 'c_email' => 'xyz@gmail.com', 'c_phone' => '37838292', 'c_name' => 'Small Business', 'c_adress' => 'About Globe Bank', 'assigned' => 'Paul Joyce'],
    ['c_id' => '4', 'c_email' => 'xyz@gmail.com', 'c_phone' => '3738838', 'c_name' => 'Commercial', 'c_adress' => 'About Globe Bank', 'assigned' => 'Lynne Joyce'],
  ];
?>

<table class = "list">
<tr>
<th>ID</th>
<th>Email</th>
<th>Phone</th>
<th>Name</th>
<th>Address</th>
<th>Assigned To</th>
<th>&nbsp;</th>
<th>&nbsp;</th>
<th>&nbsp;</th>
</tr>

<?php foreach($customers as $customer){ ?>

<tr>
<td><?php echo h($customer['c_id'])?></td>
<td><?php echo h($customer['c_email'])?></td>
<td><?php echo h($customer['c_phone'])?></td>
<td><?php echo h($customer['c_name'])?></td>
<td><?php echo h($customer['c_adress'])?></td>
<td><?php echo h($customer['assigned'])?></td>
<td><a class="action" href = "<?php echo url_for('/public/customers/show.php?id='.$customer['c_id']) ; ?>">VIEW </a></td>
<td><a class="action" href = "<?php echo url_for('/public/customers/edit_customer.php?id='.$customer['c_id']) ; ?>">EDIT</a></td>
<td><a class="action" href = "">DELETE </a></td>
</tr>
<?php } ?>
</table>
