<?php
require_once '../utils/Auth.php';
require_once '../utils/Input.php';

function pageController(){

	session_start();

	if (!Auth::check()){
		header('Location: /auth/login');
		exit();
	}

	$username = Auth::user();
	$user = User::findUserByUsername($username);	
	$email = $user->attributes['email'];
	$password = $user->attributes['password'];

	$errors = array();

	if (!empty($_POST)){

		if (Input::notEmpty('email')){
			try {
				$email = Input::getEmail('email');
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
		}
		if (Input::notEmpty('password')){
			try {
				$password = Input::getString('password');
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
		}

		if (Input::notEmpty('passwordmatch')){
			try {
				$passwordmatch = Input::getString('passwordmatch');
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
		}

		if (Input::notEmpty('passwordmatch') && Input::notEmpty('password')){
			try{
				Input::checkMatch($password, $passwordmatch);
			} catch(Exception $e){
				$error = $e->getMessage();
				array_push($errors, $error);
			}
		}
		
		if (empty($errors)){
			$user->attributes['username'] = $username;	
			$user->attributes['email'] = $email;
			$user->attributes['password'] = $password;
			$user->save();
		}
	}

	return array(
		'username' => $username,
		'email' => $email,
		'password' => $password
		);

}

extract(pageController());
?>

<!DOCTYPE html>
<html>
<?php require_once('../views/header.php') ?> 
<?php require_once('../views/navbar.php') ?>

<body>
	<h1>Hello <?=$username?></h1>

	<form method = "POST">
		<a id = "emailbtn"><label>Change Email</label></a>
		<input class = "hidden" type="text" id="email" name="email" value="<?=$email?>">
		<br>
		<!-- hides passwords unless change password button is clicked -->
		<a id = "passwordbtn"><label>Change Password</label></a>
		<br>
		<input class = "hidden" type="password" id="password" name="password" placeholder = "Password">
		<br>
		<input class = "hidden" type="password" id="passwordmatch" name="passwordmatch" placeholder="Confirm Password"> 
		<br>
		<input type = "submit" name = "submit" value = "Save">
		<button class = "btn-default"><a href="/users">Cancel</a></button>
	</form>
	
</body>

<?php require_once('../views/footer.php') ?>

<script type="text/javascript">
	$("#passwordbtn").click(function(e){
		(e).preventDefault();
		$("#password").toggleClass("hidden");
		$("#passwordmatch").toggleClass("hidden");
	});
	$("#emailbtn").click(function(e){
		(e).preventDefault();
		$("#email").toggleClass("hidden");
	});


</script>
</html>








