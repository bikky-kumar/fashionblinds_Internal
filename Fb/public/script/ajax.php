
<?php require_once("../../private/initialize.php");?>
<?php $product_id = isset($_GET['product_id']) ? (int) $_GET['product_id'] : 0;


    global $db;
    $sql = "SELECT * FROM product_subtype ";
    $sql .= "WHERE product_id = '". db_escape($db, $product_id). "'";
    $product_result = mysqli_query($db, $sql);
    confirm_result_set($product_result);

		while ($row = mysqli_fetch_assoc($product_result)){
 		echo "<options>";
 		echo $row['product_subtype']. "<br />";
 		echo "</option>";
		}




?>