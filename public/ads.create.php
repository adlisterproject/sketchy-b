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

		$target= "upload_images";

		if(Input::notEmpty('item_name') 
			&& Input::notEmpty('price') 
			&& Input::notEmpty('description') 
			&& Input::notEmpty('contact')
			&& Input::notEmpty('image')){

			if(empty($errors)){
				if(array_key_exists('image', $_FILES)){
					if($_FILES["image"]["error"]==UPLOAD_ERR_OK){
						$finfo = new finfo(FILEINFO_MIME_TYPE);
    					try {
    						$ext = array_search($finfo->file($_FILES['image']['tmp_name']),
        				     	array(
          					 		'jpg' => 'image/jpeg',
           					 		'png' => 'image/png',
          					 		'gif' => 'image/gif'
      						  	),
      						  	true);
    						if (false === $ext) {
      						  	throw new RuntimeException('Invalid file format.');
    						}
   					 	} catch (RunTimeException $e){
    							$error=$e->getMessage();
    							array_push($errors, $error);
    						} 
						$tmp_name=$_FILES["image"]["tmp_name"];
						$name=$_FILES["image"]["name"];
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

<h4><?php 
		if(Input::notEmpty('item_name')
			&& Input::notEmpty('price')
			&& Input::notEmpty('description')
			&& Input::notEmpty('contact')):

			var_dump($errors);

			if (!empty($errors)):
				foreach ($errors as $error):
					echo $error;?>
				<br>
				<?php endforeach;
			endif;
		endif;?>
</h4>

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


  		<div class="form-group">
		<input type="text" id="contact" name="contact" placeholder="Contact Info.">
		</div>
		
		<input type="submit" value="add">
	</form>
</div>
	
</body>

<?php require_once('../views/footer.php') ?>
</html>