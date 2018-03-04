<?php

  $staffs = [
    ['c_id' => '1', 'c_email' => 'xyz@gmail.com', 'c_phone' => '930333', 'c_name' => 'About Globe', 'c_adress' => 'About Globe Bank'],
    ['c_id' => '2', 'c_email' => 'xyz@gmail.com', 'c_phone' => '378383', 'c_name' => 'Consumer', 'c_adress' => 'About Globe Bank'],
    ['c_id' => '3', 'c_email' => 'xyz@gmail.com', 'c_phone' => '37838292', 'c_name' => 'Small Business', 'c_adress' => 'About Globe Bank'],
    ['c_id' => '4', 'c_email' => 'xyz@gmail.com', 'c_phone' => '3738838', 'c_name' => 'Commercial', 'c_adress' => 'About Globe Bank'],
  ];
?>

<table class = "list">
<tr>
<th>ID</th>
<th>Email</th>
<th>Phone</th>
<th>Name</th>
<th>Address</th>
<th>&nbsp;</th>
<th>&nbsp;</th>
<th>&nbsp;</th>
</tr>

<?php foreach($staffs as $staff){ ?>

<tr>
<td><?php echo h($staff['c_id'])?></td>
<td><?php echo h($staff['c_email'])?></td>
<td><?php echo h($staff['c_phone'])?></td>
<td><?php echo h($staff['c_name'])?></td>
<td><?php echo h($staff['c_adress'])?></td>
<td><a class="action" href = "<?php echo url_for('/public/staff/show.php?id='.$staff['c_id']) ; ?>">VIEW </a></td>
<td><a class="action" href = "">EDIT</a></td>
<td><a class="action" href = "">DELETE </a></td>
</tr>
<?php } ?>
</table>
