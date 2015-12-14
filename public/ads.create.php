<?php
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
</form>
</div>
	
</body>

<?php require_once('../views/footer.php') ?>
</html>