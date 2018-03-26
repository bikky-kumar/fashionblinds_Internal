

<?php 

$price_table = array(
					'width' => array('120', '140'), 
					'height' => array('40', '80') , 
					'price'=> array('35', '60')
				);

echo $price_table['width'][0];


print_r(read_csv('EXCEL-WOODVENETAIN-BUDGET-35MM.csv'));

?>



<?php

function read_csv($filename){

	$rows = array();
	$rows = file($filename);
	return $rows;

}


function write($filename, $rows){

}


?>