<?php
require_once '../utils/Auth.php';

session_start();
?>

<!DOCTYPE html>
<html>
<?php require_once('../views/header.php') ?> 
<?php require_once('../views/navbar.php') ?>

<body>
	<!-- placeholders until we style with css -->
	<h1 class="center">Welcome to Sketchy-B!</h1>

	<!-- if user is logged in they cannot create another profile -->
	<?php
	if (!Auth::check()):?>
	<div class="center" id = "user_create">
		<a href="/users/create">Create a Profile!</a>
	</div>
	<?php endif;?>

	
</body>

<?php require_once('../views/footer.php') ?>
</html>