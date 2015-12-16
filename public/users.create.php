<?php

require_once '../utils/Input.php';
require_once '../models/User.php';


function pageController(){

	$errors = array();
	

	if(!empty($_POST)){
		// this block checks to see if an error is going to be thrown
		try{
			$username = Input::getString('username', 0, 50);
		} catch (OutOfRangeException $e){
			$error = $e->getMessage();
			array_push($errors, $error);
		} catch (InvalidArgumentException $e){
			$error = $e->getMessage();
			array_push($errors, $error);
		} catch (DomainException $e){
			$error = $e->getMessage();
			array_push($errors, $error);
		} catch(LengthException $e){
			$error = $e->getMessage();
			array_push($errors, $error);
		} catch(Exception $e){
			$error = $e->getMessage();
			array_push($errors, $error); 
		} 

		try{
			$email = Input::getString('email', 0, 50);
		} catch (OutOfRangeException $e){
			$error = $e->getMessage();
			array_push($errors, $error);
		} catch (InvalidArgumentException $e){
			$error = $e->getMessage();
			array_push($errors, $error);
		} catch (DomainException $e){
			$error = $e->getMessage();
			array_push($errors, $error);
		} catch(LengthException $e){
			$error = $e->getMessage();
			array_push($errors, $error);
		} catch(Exception $e){
			$error = $e->getMessage();
			array_push($errors, $error); 
		}

		try{
			$password = Input::getString('password', 0, 50);
		} catch (OutOfRangeException $e){
			$error = $e->getMessage();
			array_push($errors, $error);
		} catch (InvalidArgumentException $e){
			$error = $e->getMessage();
			array_push($errors, $error);
		} catch (DomainException $e){
			$error = $e->getMessage();
			array_push($errors, $error);
		} catch(LengthException $e){
			$error = $e->getMessage();
			array_push($errors, $error);
		} catch(Exception $e){
			$error = $e->getMessage();
			array_push($errors, $error); 
		} 

		try{
			$passwordmatch = Input::getString('passwordmatch', 0, 50);
		} catch (OutOfRangeException $e){
			$error = $e->getMessage();
			array_push($errors, $error);
		} catch (InvalidArgumentException $e){
			$error = $e->getMessage();
			array_push($errors, $error);
		} catch (DomainException $e){
			$error = $e->getMessage();
			array_push($errors, $error);
		} catch(LengthException $e){
			$error = $e->getMessage();
			array_push($errors, $error);
		} catch(Exception $e){
			$error = $e->getMessage();
			array_push($errors, $error); 
		} 

		//makes sure that passwords match
		try{
			Input::checkMatch($password, $passwordmatch);
		} catch(Exception $e){
			$error = $e->getMessage();
			array_push($errors, $error);
		}
		
		

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
				$user->save();
				$errors = array();

				//after user is logged in takes them to profile page
				header('Location: users.show.php');
				exit();
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
			<input type="text" id="email" name="email" placeholder="Email">
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