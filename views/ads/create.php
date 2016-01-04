 <?php

require_once '../utils/Auth.php';
require_once '../utils/Input.php';
require_once '../utils/ValidateAd.php';
require_once '../models/Ad.php';
require_once '../models/User.php';

function pageController(){

	session_start();

	if (!Auth::check()){
		header('Location: /auth/login');
		exit();
	}

	$username = Auth::user();
	$user = User::findUserByUsername($username);
	$errors = array();


	if(!empty($_POST)){

		$item_name = ValidateAd::getItemName();
 
		$price = ValidateAd::getPrice();
		
		$description = ValidateAd::getDescription();
		
		$contact = ValidateAd::getContact();

		$errors = ValidateAd::getErrors();

		// $tmp_name=$_FILES["image"]["tmp_name"];
		// $name=$_FILES["image"]["name"];
		// 	try {
		// 		if(
		// 			$name != "jpg" 
		// 			&& $name != "png" 
		// 			&& $name != "jpeg"
		// 			&& $name != "gif" )
  //   			{
  //     				throw new RuntimeException('Invalid file format.');
  //   			}
  //  			} catch (RunTimeException $e){
  //   				$error=$e->getMessage();
  //   				array_push($errors, $error);
  //   			}

		$finfo = new finfo(FILEINFO_MIME_TYPE);
			try {
				$ext = array_search($finfo->file($_FILES['image']['tmp_name']),
			     	array(
					 		'jpg' => 'image/jpeg',
					 		'png' => 'image/png',
					 		'gif' => 'image/gif'
					  	),
					  	true);
				if (false === $ext){
					throw new RuntimeException('Invalid file format.');
				}
		 	} catch (RunTimeException $e){
				$error=$e->getMessage();
				array_push($errors, $error);
			} 

		$target= "upload_images";

		if(Input::notEmpty('item_name') 
			&& Input::notEmpty('price') 
			&& Input::notEmpty('description') 
			&& Input::notEmpty('contact') 
			){

			if(empty($errors)){
				if(array_key_exists('image', $_FILES)){
					if($_FILES["image"]["error"]==UPLOAD_ERR_OK){
						$tmp_name=$_FILES["image"]["tmp_name"];
						$name=$_FILES["image"]["name"];
						try {
							if($name != "jpg" 
							&& $name != "png" 
							&& $name != "jpeg"
							&& $name != "gif" )
    						 {
      						  	throw new RuntimeException('Invalid file format.');
    						}
   					 	} catch (RunTimeException $e){
    							$error=$e->getMessage();
    							array_push($errors, $error);
    						}


						
						move_uploaded_file($tmp_name, "$target/$name");
					}

				} else {

				}

				$ad = new Ad();
				$ad->item_name = $item_name;
				$ad->price = $price;
				$ad->description = $description;
				$ad->contact = $contact;
				$ad->user_id = $user->attributes['id'];
				$ad->image_path = "$target/$name";
				$ad->save();

				// redirect from add to the users profile so they can see what they added
				header('Location: /users');
				exit();

			}
		}
	}

	return array(
		'username' => $username,
		'errors'   => $errors
	);
}

extract(pageController());
?>

<!DOCTYPE html>
<html>
<?php require_once('../views/header.php') ?> 

<body>
<?php require_once('../views/navbar.php') ?>

<h4>
	<?php if (!empty($errors)): ?>
		<?php foreach ($errors as $error): ?>
			<?= $error; ?>
			<br>
		<?php endforeach; ?>
	<?php endif; ?>
</h4>


<div class="container">
	<div class="row">
		<div class="col-md-4 createform">
			<div class="form_ads">
				<h1>Create an Ad!</h1>
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
			    	</div>


			  		<div class="form-group">
					<input type="text" id="contact" name="contact" placeholder="Contact Info.">
					</div>
					
					<input type="submit" value="add">
				</form>
			</div>
		</div>
	</div>
</div>
	
</body>

<?php require_once('../views/footer.php') ?>
</html>

