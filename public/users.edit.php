<?php
require_once '../utils/Auth.php';

function pageController(){

	session_start();

	if (!Auth::check()){
		header('Location: auth.login.php');
		exit();
	}

	$username = Auth::user();


	if(!empty($_POST)){
		if (Input::notEmpty('username')
			&& Input::notEmpty('password')
			&& Input::notEmpty('passwordmatch')
			&& Input::notEmpty('email')){

			////does not save any user info yet
			if(empty($errors)){
				// using models to save information	
				$user = new User();
				$user->username = $username;
				$user->email= $email;
				$user->password = $password;
				$user->save();
				$errors = array();
			}
		}
	}

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