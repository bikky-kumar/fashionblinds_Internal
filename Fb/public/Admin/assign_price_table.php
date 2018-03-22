<?php require_once("../../private/initialize.php");?>

<?php require_admin_login(); ?>
<?php $page_title = "Assign Price table" ; ?>
<?php require_once(SHARED_PATH .'/header.php');
?>


<?php

if (isset($_POST['submit'])){

	//the path to store the uploaded csv file
	//$target = "pricefiles/".basename($_FILES[''][''])

	//this will go and get the input type names csv_file
	$file = $_FILES['csv_file'];

	//php gets all this information about the file in array
	$fileName = $file['name'];
	$fileTmpLoc = $file['tmp_name'];
	$fileSize = $file['size'];
	$fileError = $file['error'];
	$fileType = $file['type'];

	//get the extension of te file by sepearating the file by explode function by . symbol

	$fileExt = explode('.', $fileName);
	$fileActualExt = strtolower(end($fileExt));

	//array of files to be allowed
	$allowedFiles = array('csv', 'php');

	// in array function checks if the value  exists in the given array, 1st param is the value and second is the array in which it will check
	if (in_array($fileActualExt, $allowedFiles)){
		if($fileError === 0){
				if($fileSize < 100000){
					//here we can change the file name with rNDOM STRINGS BUT I want to overwrite the file
					$fileDestination = 'pricefiles/'.$fileName;
					//first parameter is the temproray location and second parameter is the destination in the directory
					move_uploaded_file($fileTmpLoc, $fileDestination);
					echo "File succesfully uploaded";
				}
				else{
					echo "file to large";
				}
		}
		else{
			echo "there was error with the file";
		}	
	}
	else{
		echo "cannot upload the filetype";
	}
}


?>

<div class ="bread-crumb">
<a class="back_link" href="<?php echo return_dashboard(); ?>"> &laquo; Back to Admin</a> 
</div>

<br />
<br />
<div id = "price_table_uploads">
    <form method = "POST"  action = "assign_price_table.php" enctype="multipart/form-data">
	    <table border = "1" class= "list">
	        <tr>
	            <th>Type</th>
	            <th>Subtype</th>
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
