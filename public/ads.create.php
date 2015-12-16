<?php

require_once '../utils/Auth.php';
require_once '../utils/Input.php';
require_once '../models/Ad.php';

$errors = array();


if(!empty($_POST)){

	// try{
	// $item_name = Input::getString('item_name');
	// } catch(OutOfRangeException $e){
	// 	$error=$e->getMessage();
	// 	array_push($errors, $error);
	// } catch(InvalidArgumentException $e){
	// 	$error=$e->getMessage();
	// 	array_push($errprs, $error);
	// } catch(DomainException $e){
	// 	$error=$e->getMessage();
	// 	array_push($errors, $error);
	// } catch(LengthException $e){
	// 	$error=$e->getMessage();
	// 	array_push($errors, $error);
	// }

	// try{
	// $price = Input::getString('price');
	// } catch(OutofRangeException $e){
	// 	$error=$e->getMessage();
	// 	array_push($errors, $error);
	// } catch(InvalidArgumentException $e){
	// 	$error=$e->getMessage();
	// 	array_push($errors, $error);
	// } catch(DomainException $e){
	// 	$error=$e->getMessage();
	// 	array_push($errors, $error);
	// } catch(LengthException $e){
	// 	$error=$e->getMessage();
	// 	array_push($errors, $error);
	// }

	// try{
	// $description= Input::getString('description');
	// } catch(OutOfRangeException $e){
	// 	$error=$e->getMessage();
	// 	array_push($errors, $error);
	// } catch(InvalidArgumentException $e){
	// 	$error=$e->getMessage();
	// 	array_push($errors, $error);
	// } catch(DomainException $e){
	// 	$error=$e->getMessage();
	// 	array_push($errors, $error);
	// } catch(LengthException $e){
	// 	$error=$e->getMessage();
	// 	array_push($errors, $error);
	// }

	// try{
	// $contact = Input::getString('contact');
	// } catch(OutofRangeException $e){
	// 	$error=$e->getMessage();
	// 	array_push($errors, $error);
	// } catch(InvalidArgumentException $e){
	// 	$error=$e->getMessage();
	// 	array_push($errors, $error);
	// } catch(DomainException $e){
	// 	$error=$e->getMessage();
	// 	array_push($errors, $error);
	// } catch(LengthException $e){
	// 	$error=$e->getMessage();
	// 	array_push($errors, $error);
	// }

// INPUT FUNCTIONS
// $item_name = Input::getString('item_name');
// $price = Input::getNumber('price');
// $description= Input::getString('description');
// $contact = Input::getString('contact');


// 	if(Input::notEmpty('item_name') 
// 		&& Input::notEmpty('price') 
// 		&& Input::notEmpty('description') 
// 		&& Input::notEmpty('contact')){

// 		if(empty($errors)){
// 			$ad = new Ad();
// 			$ad->item_name = $item_name;
// 			$ad->price = $price;
// 			$ad->description = $description;
// 			$ad->contact = $contact;
// 			$ad->save();
// 		}
	
// 	}
	
}

// FILE UPLOAD

var_dump($_FILES);

$target_dir= "";
$target_file= $target_dir . basename($_FILES["image"]["name"]);
$uploadOk=1;
$imageFileType



// function pageController(){

// 	session_start();

// 	if (!Auth::check()){
// 		header('Location: auth.login.php');
// 		exit();
// 	}

// 	$username = Auth::user();

// 	return array(
// 		'username' => $username
// 		);

// }

// extract(pageController());
?>

<!DOCTYPE html>
<html>
<?php require_once('../views/header.php') ?> 

<body>
<?php require_once('../views/navbar.php') ?>

<div class="form_ads">
	<form class="form-horizontal" method="POST" enctype="multipart/form-data">
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
		

		<div class="form-group">
    	<label for="exampleInputFile">Picture input</label>
    	<input type="file" name="image" id="exampleInputFile">
    	<p class="help-block">Add a picture!</p>
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