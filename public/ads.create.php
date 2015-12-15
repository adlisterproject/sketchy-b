<?php
require_once '../utils/Auth.php';

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
</div>
	
</body>

<?php require_once('../views/footer.php') ?>
</html>