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
	$user = User::findUserByUsername($username);
	$errors = array();


	if(!empty($_POST)){

		try{
		$item_name = Input::getString('item_name', 0, 50);
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
			$price = Input::getNumber('price');
		} catch (OutOfRangeException $e){
			$error = $e->getMessage();
			array_push($errors, $error);
		} catch (InvalidArgumentException $e){
			$error = $e->getMessage();
			array_push($errors, $error);
		} catch (DomainException $e){
			$error = $e->getMessage();
			array_push($errors, $error);
		} catch(RangeException $e){
			$error = $e->getMessage();
			array_push($errors, $error);
		} catch (Exception $e){
			array_push($errors, $e->getMessage());
		}

		try{
		$description= Input::getString('description', 0, 50);
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
		$contact = Input::getString('contact', 0, 50);
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


		if(Input::notEmpty('item_name') 
			&& Input::notEmpty('price') 
			&& Input::notEmpty('description') 
			&& Input::notEmpty('contact')){

			if(empty($errors)){
				$ad = new Ad();
				$ad->item_name = $item_name;
				$ad->price = $price;
				$ad->description = $description;
				$ad->contact = $contact;
				$ad->user_id = $user->attributes['id'];
				$ad->save();

				// redirect from add to the users profile so they can see what they added
				header('Location: users.show.php');
				exit();

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

<body>
<?php require_once('../views/navbar.php') ?>

<div class="form_ads">
	<form class "form-horizontal" method="POST">
		<div class="form-group">
		<input type="text" id="item_name" name="item_name" placeholder="Item Name">
		</div>

		<div class="form-group">
		<input type="text" id="price" name="price" placeholder="Price">
		</div>

		<div class="form-group">
		<textarea id="description" name="description" rows="5" cols="40" placeholder=
		"Description of Item"></textarea>
		</div>
		

		<!-- <div class="form-group">
    	<label for="exampleInputFile">Picture input</label>
    	<input type="file" name = "filetoUpload" id="exampleInputFile">
    	<p class="help-block">Add a picture!</p> -->
    	<!-- <form action="upload.php" method="post" enctype="multipart/form-data">
	    Select image to upload:
	    <input type="file" name="fileToUpload" id="fileToUpload">
	    <input type="submit" value="Upload Image" name="submit">
		</form> -->

  		</div>
  		
  		<div class="form-group">
		<input type="text" id="contact" name="contact" placeholder="Contact Info.">
		</div>
		
		<!-- <div class="form-group">
			<label for="exampleInputFile">Upload an Image</label>
			<input type="file" id="exampleInputFile">
			<p class="help-block">Items with pictures tend to sell quicker.</p>
		</div> -->
		<input type="submit" value="add">
	</form>
</div>
	
</body>

<?php require_once('../views/footer.php') ?>
</html>