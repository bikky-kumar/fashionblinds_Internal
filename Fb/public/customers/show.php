<?php 
//PHP < 7.0
 require_once("../../private/initialize.php");
$id = isset($_GET['id']) ? $_GET['id'] : '1'; //<PHP 7.0

//$id = $_GET['id'] ?? '1'; //>PHP 7.0
echo h($id);

?>

<a class="back-link" href = "<?php echo url_for('/public/Admin/index.php') ?>">&laquo; Back to List</a>
</div>

<a href = "show.php?name=<?php echo urlencode('John Doe'); ?>">Link1</a><br />
<a href = "show.php?company=<?php echo urlencode('Widget&More'); ?>">Link2</a><br />
<a href = "show.php?query=<?php echo urlencode('*^%'); ?>">Link3</a><br />