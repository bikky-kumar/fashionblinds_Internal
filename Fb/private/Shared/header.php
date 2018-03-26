<!doctype html>
<html>
<head>
<link rel = "Stylesheet" media = "all" href = "<?php echo url_for('public/stylesheets/styles.css')?>">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<link href="https://fonts.googleapis.com/css?family=Gloria+Hallelujah|Indie+Flower|Oswald" rel="stylesheet">
<title>FB  <?php echo h($page_title); ?></title>
</head>

<body>
<div id = "site-header">
<div id = "logo"><h1>salesmanlab.com</h1></div>
<div id = "right-header">
<div id = "logout"><a href = "<?php echo url_for('public/logout.php');?>">logout</a></div>
<div id = "current_date"><?php current_date(); ?></div>
<div id = "current_user">
	<div id = "userimage"><img src="<?php echo url_for('public/images/userimage.png'); ?>" alt="user-image"></a></div>
	<div id = "username"><p><?php welcome(); ?></p></div>
</div>
</div>
</div>