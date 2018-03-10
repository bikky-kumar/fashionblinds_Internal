<?php require_once("../../private/initialize.php"); ?>

<?php


if (is_post_request()){
$fullname = isset($_POST['fullname']) ? $_POST['fullname'] : ''; 
$email = isset($_POST['email']) ? $_POST['email'] : ''; 
$phone = isset($_POST['phone']) ? $_POST['phone'] : ''; 
$address = isset($_POST['address']) ? $_POST['address'] : ''; 
$date = isset($_POST['date']) ? $_POST['date'] : ''; 
$assign = isset($_POST['assign']) ? $_POST['assign'] : ''; 
$comment = isset($_POST['comment']) ? $_POST['comment'] : ''; 

echo "Form parameters <br />";

echo $fullname . "<br />" ;
echo $email . "<br />";
echo $phone  . "<br />";
echo $address . "<br />";
echo $date . "<br />";
echo $assign . "<br />"; 
echo $comment . "<br />";
}
else{
	redirect_to(url_for('/public/admin/index.php'));
}

?>