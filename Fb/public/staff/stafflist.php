
<?php require_once("../../private/initialize.php"); ?>

<?php
//$db is connection and $sql is query
$staff_set = find_all_staff();
?>

<table class = "list">
<tr>
<th>ID</th>
<th>Full Name</th>
<th>Phone</th>
<th>email</th>
<th>password</th>
<th>&nbsp;</th>
<th>&nbsp;</th>
<th>&nbsp;</th>
</tr>

<?php while($staff =  mysqli_fetch_assoc($staff_set)){ ?>

<tr>
<td><?php echo h($staff['staff_id'])?></td>
<td><?php echo h($staff['staff_fullname'])?></td>
<td><?php echo h($staff['staff_Phone'])?></td>
<td><?php echo h($staff['staff_email'])?></td>
<td><?php echo h($staff['staff_password'])?></td>
<td><a class="action" href = "<?php echo url_for('/public/staff/show.php?id='.$staff['staff_id']) ; ?>"><img src="<?php echo url_for('public/images/view.png'); ?>" alt="View button"></a></td>
<td><a class="action" href = "<?php echo url_for('/public/staff/edit_staff.php?id='.$staff['staff_id']) ; ?>"><img src="<?php echo url_for('public/images/edit.png'); ?>" alt="Edit button"></a></td>
<td><a class="action" href = "<?php echo url_for('/public/staff/delete_staff.php?id='.$staff['staff_id']) ; ?>"><img src="<?php echo url_for('public/images/deleteButton.png'); ?>" alt="Delete button"></a></td>
</tr>
<?php } ?>
</table>
