<?php
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
			<input type="password" id="password" name="password" placeholder="Confirm Password"> 
			<br>
		</form>
	</div>

<?php require_once('../views/footer.php') ?>

</body>


</html>