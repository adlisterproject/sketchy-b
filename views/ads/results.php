<?php

	require '../models/Ad.php';
	require '../utils/Auth.php';
	session_start();
	$ads_list = Ad::all();
?>

<html>
	<?php require_once('../views/header.php'); ?>
	<?php require_once ('../views/navbar.php');?>

<body>
	

	<?php require_once ('../views/footer.php');?>  
</body>
</html>