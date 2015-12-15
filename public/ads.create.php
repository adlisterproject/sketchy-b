<?php

require_once '../utils/Auth.php';

function insertads($dbc){

	$insert = "INSERT INTO adlister (item_name, price, description, contact)
	VALUES (:item_name, :price, :description, :contact)";
	$stmt->bindValue(':item_name', $ad['item_name'], PDO::PARAM_STR);
	$stmt->bindValue(':price', $ad['price'], PDO::PARAM_STR);
	$stmt->bindValue(':description', $ad['description'], PDO::PARAM_STR);
	$stmt->bindValue(':contact', $ad['contact'], PDO::PARAM_STR);
	$stmt->execute();
}

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

<body>
<?php require_once('../views/navbar.php') ?>

<div class= "form_ads">
<<<<<<< HEAD
<form method= "POST">
<input type="text" id="name" name="username" placeholder="Item Name">
<br>

<input type="text" id="price" name="price" placeholder="Price">
<br>

<textarea id="description" name="description" rows="5" cols="40">Description of Item</textarea>
<br>

<input type="text" id="contact" name="contact" placeholder="Contact Info.">
<br>
<input type="submit" value="add">
</form>
=======
	<form>
		<input type="text" id="name" name="username" placeholder="Item Name">
		<br>
		<input type="text" id="price" name="price" placeholder="Price">
		<br>
		<textarea id="description" name="description" rows="5" cols="40">Description of Item</textarea>
		<br>
		<input type="text" id="contact" name="contact" placeholder="Contact Info.">
		<br>
		<div class="form-group">
			<label for="exampleInputFile">Upload an Image</label>
			<input type="file" id="exampleInputFile">
			<p class="help-block">Items with pictures tend to sell quicker.</p>
		</div>
	</form>
>>>>>>> master
</div>
	
</body>

<?php require_once('../views/footer.php') ?>
</html>