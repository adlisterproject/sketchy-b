<?php
require_once '../utils/db_connect.php';
require_once '../utils/Input.php';
require_once '../models/Ad.php';

function createUser($dbc, $username, $password){
	$create = "CREATE USER ':username'@'localhost' IDENTIFIED BY ':password'";
	$stmt = $dbc->prepare($create);
	$stmt->bindValue(':username', $username, PDO::PARAM_STR);
	$stmt->bindValue(':password', $password, PDO::PARAM_STR);
	$stmt->execute();
}

function grantPriviledge($dbc, $username){
	$grant = "GRANT SELECT, INSERT, UPDATE, DELETE ON adlister. ". static::$table ." TO ':username'@'localhost'";
	$stmt = $dbc->prepare($grant);
	$stmt->bindValue(':username', $username, PDO::PARAM_STR);
	$stmt->execute();
}

function pageController(){

	$errors = array();

	//this block checks to see if an error is going to be thrown
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

	if(!empty($_POST)){
		// add inputed data into database
		if (Input::notEmpty('username')
			&& Input::notEmpty('parkname')){

			// will continue if there are no errors and if the password matches the other password
			if(empty($errors) && (strncmp($password,$passwordmatch,strlen($password)))){
				createUser($dbc, $username, $password);
				grantPriviledge($dbc, $username);
				$errors = array();
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
		<form>
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

<?php require_once('../views/footer.php') ?>

</body>


</html>