<?php
	define('MAGENTO', realpath(dirname(__FILE__)));
	ini_set('memory_limit', '1024M');
	ini_set('display_errors', 1);
	require_once MAGENTO . '/app/Mage.php';

	Mage::app();
	Mage::getSingleton('core/session', array('name'=>'adminhtml'));

	$dbconfig = Mage::getSingleton('core/resource')->getConnection('core_read')->getConfig();
         $session = Mage::getSingleton('admin/session');
	if ( !$session->isLoggedIn() )
	{
		echo "<script>alert('admin session doesn\'t exist, please login')</script>";
		die();
	}

	
	$dbhost = $dbconfig['host'];
	$dbuser = $dbconfig['username'];
	$dbpass = $dbconfig['password'];
	$dbname = $dbconfig['dbname'];
	$conn = mysql_connect($dbhost, $dbuser, $dbpass) or die ('Error connecting to mysql');
	mysql_select_db($dbname);
	
	//$conn = Mage::getSingleton('core/resource')->getConnection('core_write');

	$strTables        = Mage::getSingleton('core/resource')->getTableName('ocs_matrixproduct');
	$priceTable       = Mage::getSingleton('core/resource')->getTableName('pricefiles');
	
	function printArray($objArray){
		print "<pre>";
		print_r($objArray);
		print "</pre>";
	}
