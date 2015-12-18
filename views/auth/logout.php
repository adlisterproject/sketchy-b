<?php
require_once '../utils/Auth.php';

session_start();

Auth::logout();

header("Location: /auth/login");
exit();

?>

<!DOCTYPE html>
<html>
<?php require_once('../views/header.php') ?> 
<?php require_once('../views/navbar.php') ?>

<body>
	
</body>

<?php require_once('../views/footer.php') ?>
</html>