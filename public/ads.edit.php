<?php
require_once '../utils/Auth.php';
require_once '../utils/Input.php';
require_once '../models/Ad.php';
require_once '../models/User.php';


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
	
</body>

<?php require_once('../views/footer.php') ?>
</html>