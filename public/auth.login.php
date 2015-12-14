<?php

require_once '../utils/Auth.php';
require_once '../utils/Input.php';
require_once '../utils/Logger.php'; 

function pageController()
{

	session_start();

	$message  = '';


	if (Auth::check()){
		header('Location: users.show.php');
		exit();
	}

if (!empty($_POST)){

		$username = Input::get('username');
		$password = Input::get('password');

		$log = new Log();

		if (Auth::attempt($username, $password)){
			$log->info('User {$username} logged in.');
			header('Location: users.show.php');
			exit();
		} else {
			$log->error('User {$username} failed to log in!');
			$message = 'Please input the proper username and password.';
		}	
	}

	return array(
		'message'  => $message
	);
}

extract(pageController());
?>

<!DOCTYPE html>
<html>
<?php require_once('../views/header.php') ?> 
<?php require_once('../views/navbar.php') ?>

<body>
	<!-- login block -->
	<h1>Log-In</h1>
    <form method="POST">
        <label>Username</label>
        <input type="text" name="username"><br>
        <label>Password</label>
        <input type="password" name="password"><br>
        <input type="submit" name="submit">
    </form>
    <h2><?= $message ?></h2>
</body>

<?php require_once('../views/footer.php') ?>
</html>