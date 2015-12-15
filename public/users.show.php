<?php
require_once '../utils/Auth.php';

function pageController(){

	session_start();

	if (!Auth::check()){
		header('Location: auth.login.php');
		exit();
	}

	$username = Auth::user();

	return array(
		'username' => $username
		);

}

extract(pageController());

?>

<!DOCTYPE html>
<html>
<?php require_once('../views/header.php') ?> 
<?php require_once('../views/navbar.php') ?>

<body>
	<br>
	<br>
	<br>
	<h1>Hello <?=$username?></h1>
	<h4><a href = "ads.create.php">Create Ad</a></h4>
	
</body>

<?php require_once('../views/footer.php') ?>
</html>