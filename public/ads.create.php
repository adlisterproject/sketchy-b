<?php

require_once '../utils/Auth.php';
require_once '../utils/Input.php';
require_once '../models/Ad.php';

function insertAds($dbc){

	$insert = "INSERT INTO " . static::$table . " (item_name, price, description, contact)
	VALUES (:item_name, :price, :description, :contact)";
	$stmt->bindValue(':item_name', $this->attributes['item_name'], PDO::PARAM_STR);
	$stmt->bindValue(':price', $this->attributes['price'], PDO::PARAM_STR);
	$stmt->bindValue(':description', $this->attributes['description'], PDO::PARAM_STR);
	$stmt->bindValue(':contact', $this->attributes['contact'], PDO::PARAM_STR);
	$stmt->execute();
}

if(!empty($_POST)){
	if(
	Input::notEmpty('item_name') &&
	Input::notEmpty('price') &&
	Input::notEmpty('description') &&
	Input::notEmpty('contact')){
		insertAds($dbc);
	}
}

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

<div class= "form_ads">
	<form method= "POST" action="ads.index.php">
		<input type="text" id="name" name="username" placeholder="Item Name">
		<br>
		<input type="text" id="price" name="price" placeholder="Price">
		<br>
		<textarea id="description" name="description" rows="5" cols="40">Description of Item</textarea>
		<br>
		<input type="text" id="contact" name="contact" placeholder="Contact Info.">
		<br>
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