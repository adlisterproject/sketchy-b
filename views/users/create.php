<?php

require_once '../utils/Input.php';
require_once '../utils/Logger.php'; 
require_once '../utils/Auth.php'; 
require_once '../utils/ValidateUser.php'; 



function pageController(){

	session_start();

	
	$errors = array();
	

	if(!empty($_POST)){
		// this block checks to see if an error is going to be thrown
		$username = ValidateUser::getUsername();

		$email = ValidateUser::getEmail(); 

		$password = ValidateUser::getPassword();
		
		$passwordmatch = ValidateUser::getPasswordMatch(); 

		//makes sure that passwords match
		if(isset($password)&& isset($passwordmatch)){
			ValidateUser::getCheckMatch($password, $passwordmatch);
		}
		
		$errors = ValidateUser::getErrors();
		
		

		// add inputed data into database
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

				try {
					$user->save();
					$log = new Log();
					// if someone attempts to create a profile using a username and hypothetically the same password they cant get to the existing users profile
					if (Auth::attempt($username, $password)){
						$log->info('User {$username} logged in.');
						header('Location: /users');
						exit();
					} else {
						$log->error('User {$username} failed to log in!');
						$message = 'Please input the proper username and password.';
					}
				} catch (Exception $e){
		            $error = $e->getMessage();
		            array_push($errors, $error);
		        }

		        if(empty($errors)){
		        	$errors = array();
		        }
       
				

				

			}
		}
	}

	return array(
		'errors' => $errors
		);
}	

extract(pageController());
?>

<!DOCTYPE html>
<html>
<?php require_once('../views/header.php') ?> 
<?php require_once('../views/navbar.php') ?>
<body>

	<h1>Create an Account!</h1>

	<div class= "form_users">
		<form method = "POST">
			<input type="text" id="username" name="username" placeholder="Username">
			<br>
			<input type="email" id="email" name="email" placeholder="Email">
			<br>
			<input type="password" id="password" name="password" placeholder="Password">
			<br>
			<input type="password" id="passwordmatch" name="passwordmatch" placeholder="Confirm Password"> 
			<br>
			<input type = "submit" name = "submit" value = "Create">
		</form>
	</div>

	<h4><?php 
		if(Input::notEmpty('username')
			&& Input::notEmpty('email')
			&& Input::notEmpty('password')
			&& Input::notEmpty('passwordmatch')):

			if (!empty($errors)):
				foreach ($errors as $error):
					echo $error;?>
				<br>
				<?php endforeach;
			endif;
		endif;?>
	</h4>



<?php require_once('../views/footer.php') ?>

</body>


</html>