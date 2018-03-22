<!doctype html>
<html>
<head>
<link rel = "Stylesheet" media = "all" href = "<?php echo url_for('public/stylesheets/styles.css')?>">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<title>FB  <?php echo h($page_title); ?></title>
</head>

<body>
<div id = "site-header">
<div id = "logo">Internal</div>
<div id = "right-header">
<div id = "current_date"><?php current_date(); ?></div>
<div id = "current_user"><?php welcome(); ?></div>
<div id = "logout"><a href = "<?php echo url_for('public/logout.php');?>">logout</a></div>
</div>
</div>