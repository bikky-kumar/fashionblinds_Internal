<?php require_once("../../private/initialize.php");?>

<?php require_admin_login(); ?>
<?php $page_title = "Assign Price table" ; ?>
<?php require_once(SHARED_PATH .'/header.php');
?>

<?php

if (isset($_POST['submit'])){

  $errors = [];	
  $product_info = [];	
  $product_info['product_id'] = isset($_POST['product_type']) ? $_POST['product_type'] : ''; 
  $product_info['product_subtype'] = isset($_POST['product_subtype']) ? $_POST['product_subtype'] : '';
  $product_info['measurement_drop'] = isset($_POST['measurement_drop']) ? $_POST['measurement_drop'] : '';

  //check if any feild is blank
	if(empty($product_info['product_id'])){
		$errors[] = "Product cannot be blank";
	}
	if(empty($product_info['product_subtype'])){
		$errors[] = "Product type cannot be blank";
	}
	if(empty($product_info['measurement_drop'])){
		$errors[] = "Product size cannot be blank";
	}


	if(empty($errors)){
	    $product_info['product_type_id'] = find_product_type($product_info['product_subtype']);
		
		csv_file_read('csv_file', $product_info);
	}
}

?>


<div class ="bread-crumb">
<a class="back_link" href="<?php echo return_dashboard(); ?>"> &laquo; Back to Admin</a> 
</div>

<?php echo display_errors($errors); ?>
<div id = "price_table_uploads">
    <form method = "POST"  action = "assign_price_table.php" enctype="multipart/form-data">

	    <table border = "1" class= "list">
	        <tr>
	            <th>Product</th>
	            <th>Product type</th>
	            <th>Width Type</th>
	            <th>upload</th>
	            <th>Action</th>
	        </tr>
	        <tr>
	            <td>
	                <select id="product_type" name="product_type" onchange="populate_subtype()">
	                    <option>None</option> 
	                    <?php  $product_set = product_list(); 
	                    while($products = mysqli_fetch_assoc($product_set)){ ?>
	                    <option value = "<?php echo h($products['product_id'])?>"><?php echo h($products['product_name'])?></option>
	                    <?php } ?>
	                </select>
	            </td>
	            <td>
	                <select id="product_subtype" name="product_subtype">
	                </select>
	            </td>
	            <td>
	                <select id="measurement_drop" name="measurement_drop">
	                    <option value = "35MM">35MM</option>
	                    <option value = "50MM">50MM</option>
	                </select>
	            </td>
	              <td>
	                <input type="file" id="csv_file" name="csv_file">
	            </td>
	             <td>
	                <input type="submit" id="submit" name="submit">
	            </td>
	        </tr>           
	    </table>
	</form>
	</div>
</div>







<?php require_once(SHARED_PATH ."/footer.php");?>


<script>
    
function populate_subtype(){

var product_type = document.getElementById("product_type");
var product_subtype = document.getElementById("product_subtype");

var product_id = product_type.options[product_type.selectedIndex].value;
var url = '../staff/ajax.php?product_id=' + product_id;
var xhr = new XMLHttpRequest();
xhr.open('GET', url, false);
xhr.send(null);
product_subtype.innerHTML = xhr.responseText;
}

</script>
