<?php 

function url_for($script_path){
    if($script_path[0] != '/'){
        $script_path = "/" . $script_path;
    }
    return WWW_ROOT . $script_path;
}

function h($string=""){
    return htmlspecialchars($string);
}

function error_404(){

    header($_SERVER["SERVER_PROTOCOL"]. "404 Not Found");
    exit();
}

function error_500(){
    header($_SERVER["SERVER_PROTOCOL"]. "500 Internal Sever Error");
    exit();
}

function redirect_to($location){
	header("Location: ".$location);
	exit;
}


function is_post_request(){
    return $_SERVER['REQUEST_METHOD'] == 'POST';
}

function is_get_request(){
    return $_SERVER['REQUEST_METHOD'] == 'GET';
}

function current_date(){
    echo  date("Y-m-d") . "<br>";
}

function welcome(){
    if(isset($_SESSION['username'])){
        echo "Welcome: ". $_SESSION['username'];
    }
    else{
     // redirect_to('../login.php');
    }
}


function display_errors($errors=array()) {
  $output = '';
  if(!empty($errors)) {
    $output .= "<div class=\"errors\">";
    $output .= "Please fix the following errors:";
    $output .= "<ul>";
    foreach($errors as $error) {
      $output .= "<li>" . h($error) . "</li>";
    }
    $output .= "</ul>";
    $output .= "</div>";
  }
  return $output;
}

//preventing SQL injection
function db_escape($connection, $string){
    return mysqli_real_escape_string($connection, $string);
}


function find_status($value){
    if ($value == 1){$status = 'Quoted';}
    elseif($value == 0){$status = 'Ordered';}
    elseif($value == 2){$status = 'in Process';}
    return  $status; 
}

function csv_file_read($filename, $product_info){

    $errors = [];
    //the path to store the uploaded csv file
    //$target = "pricefiles/".basename($_FILES[''][''])
    //this will go and get the input type names csv_file from html
    $file = $_FILES[$filename];
    //php gets all this information about the file in array
    $fileName = $file['name'];
    $fileTmpLoc = $file['tmp_name'];
    $fileSize = $file['size'];
    $fileError = $file['error'];
    $fileType = $file['type'];
    $fileExt = explode('.', $fileName);
    $fileActualExt = strtolower(end($fileExt));
    $stable_fileName = 'priceTable';
    //array of files to be allowed
    $allowedFiles = array('csv');
    // in array function checks if the value  exists in the given array, 1st param is the value and second is the array in which it will check
    if (in_array($fileActualExt, $allowedFiles)){
        if($fileError === 0){
                if($fileSize < 100000){
                    //here we can change the file name with rNDOM STRINGS BUT I want to overwrite the file
                    $fileDestination = 'pricefiles/'.$fileName;
                    //first parameter is the temproray location and second parameter is the destination in the directory

                    if (file_exists($fileDestination)) {

                        $errors[] =  "file name already exists, you can edit the price from the dashboard";

                    }
                    else{
                    move_uploaded_file($fileTmpLoc, $fileDestination);
                    show_csv_matrix_file($fileDestination);
                    echo "<br />";
                    echo "<br />";
                    matrix__toArray($fileDestination, $product_info);
                    }
                }
                else{
                    $errors[] =  "file too large";
                }
        }
        else{
           $errors[] =  "there was error with the file";
        }   
    }
    else{
        $errors[] =  "cannot upload the filetype";
    }

    echo "<br/>";
    echo "<div id = 'price_table_uploads'>". display_errors($errors) . "</div>"; 
}


function show_csv_matrix_file($filedestination){
            echo "<div id = 'price_table_uploads'><table class = 'list'>\n\n";
            echo "<div id = 'csv_upload_success'>File succesfully uploaded</div>";
            $f = fopen($filedestination, "r");
            while (($line = fgetcsv($f)) !== false) {
                $filtered_row = array_filter($line);
                echo "<tr>";
                foreach ($filtered_row as $cell) {
                echo "<td>" . htmlspecialchars($cell) . "</td>";
                }
            echo "</tr>\n";
            }
        fclose($f);
        echo "\n</table><div>";    
}

function matrix__toArray($filedestination, $product_info){
        // Create a table from a csv file 
        $csv_array = array();
        $width = array();
        $height = array();
        $price = array();
                    
        //taking the CSV file and converting into a multi-dimensional array            
        $f = fopen($filedestination, "r");
        while (($row = fgetcsv($f))) {
            $filtered_row = array_filter($row);
            array_push($csv_array, $filtered_row);
        }   

            //[row][column]

        for($i = 0; $i < sizeof($csv_array); $i++){
            
            for($j = 0; $j < sizeof($csv_array[$i])-1; $j++){
                if($i != 0){
                    array_push($width, $csv_array[$i][0]);    
                }         
            }
        }

         for($i = 0; $i < sizeof($csv_array)-1; $i++){
            
            for($j = 0; $j < sizeof($csv_array[$i]); $j++){
                if($j != 0){
                    array_push($height, $csv_array[0][$j]);    
                }         
            } 
        }   

        for($i = 0; $i < sizeof($csv_array); $i++){
            
            for($j = 0; $j < sizeof($csv_array[$i]); $j++){
                if(($j != 0) AND ($i != 0)){
                    array_push($price, $csv_array[$i][$j]);    
                }         
            }
        }

      insert_price_table($width, $height, $price , $product_info);           
}


?>