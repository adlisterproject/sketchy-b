<?php
require_once '../utils/Auth.php';
require_once '../utils/Input.php';
require_once '../models/Ad.php';


function pageController(){

	session_start();

	if (!Auth::check()){
		header('Location: /auth/login');
		exit();
	}



	$username = Auth::user();
	$user = User::findUserByUsername($username);	

	$adid = Input::get('id');
	$ad = Ad::find($adid);

	$item_name = $ad->attributes['item_name'];
	$price = $ad->attributes['price'];
	$description = $ad->attributes['description'];
	$image_path = $ad->attributes['image_path'];
	$contact = $ad->attributes['contact'];

	$errors = array();

	if (!empty($_POST)){

		if (Input::notEmpty('item_name')){
			try {
				$item_name = Input::getString('item_name');
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
		}
		if (Input::notEmpty('price')){
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
		}

		if (Input::notEmpty('description')){
			try {
				$description = Input::getString('description');
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
		}
		if (Input::notEmpty('contact')){
			try {
				$contact = Input::getString('contact');
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
		}


		
		if (empty($errors)){
			$ad->attributes['item_name'] = $item_name;	
			$ad->attributes['price'] = $price;
			$ad->attributes['description'] = $description;
			$ad->attributes['contact'] = $contact;
			$ad->attributes['image_path'] = $image_path;
			$ad->save();
		}


		if (!Input::notEmpty('delete-id')){
			//if the form has been submitted

			Ad::delete($ad->attributes['id']);
			header("Location: /ads");
			die();
			//delete the specific ad - going to need to somehow tie in the ad id to the delete buttn for that specific id
		}
	}





	return array(
		'ad' => $ad,
		'username' => $username,
		'item_name' => $item_name,
		'price' => $price,
		'description' => $description,
		'image_path' => $image_path,
		'contact' => $contact
		);

}

extract(pageController());
?>

<!DOCTYPE html>
<html>
<?php require_once('../views/header.php') ?> 
<?php require_once('../views/navbar.php') ?>

<body>
	<div class="col-sm-4 col-lg-4 col-md-4">
        <div class="thumbnail">
            <img src="<?= $ad->attributes['image_path'] ?>" alt="">
            <div class="caption">
            	<!-- make this the price class? -->
                <h4 class="pull-right"><?=$price?></h4>
                <h4><a href="/ads/show"><?=$item_name?></a>
                </h4>
                <!-- make a description class here? -->
                <!-- user can only edit ad if they are logged in and it is theirs -->
                <p><?=$description?></p>
                <p><?=$contact?></p>
                
                 	<button class="btn btn-danger btn-xs btn-delete" data-id="<?= $ad->id; ?>" data-name="<?= $item_name; ?>">Delete
                 	</button>
                 <form method="post" id="delete-form">
    				<input type="hidden" name="id" id="delete-id">
				 </form>
                 
            
        </button>
            </div>
        </div>
    </div>


    <form method = "POST">
		<a id = "namebtn"><label>Change Name</label></a>
		<input class = "hidden" type="text" id="item_name" name="item_name" value="<?=$item_name?>">
		<br>
		<a id = "pricebtn"><label>Change Price</label></a>
		<br>
		<input class = "hidden" type="text" id="price" name="price" placeholder = "<?=$price?>">
		<br>
		<a id = "descriptionbtn"><label>Change Description</label></a>
		<br>
		<input class = "hidden" type="textarea" id="description" name="description" placeholder = "<?=$description?>">
		<br>
		<a id = "contactbtn"><label>Change Contact</label></a>
		<br>
		<input class = "hidden" type="text" id="contact" name="contact" placeholder="<?=$contact?>"> 
		<br>
		<input type = "submit" name = "submit" value = "Save">
		<button class = "btn-default"><a href="/users">Back to Profile</a></button>
	</form>
	
</body>

<?php require_once('../views/footer.php') ?>
<script type="text/javascript">
	$("#namebtn").click(function(e){
		(e).preventDefault();
		$("#item_name").toggleClass("hidden");
	});
	$("#pricebtn").click(function(e){
		(e).preventDefault();
		$("#price").toggleClass("hidden");
	});
	$("#descriptionbtn").click(function(e){
		(e).preventDefault();
		$("#description").toggleClass("hidden");
	});
	$("#contactbtn").click(function(e){
		(e).preventDefault();
		$("#contact").toggleClass("hidden");
	});

	 (function() {
        "use strict";
        
        // Grab all the remove buttons and attached a click event listener to them
        $(".btn-delete").click(function() {
            // Pull out the id and name of the item we want to remove
            var adId   = $(this).data("id");
            var adName = $(this).data("name");
            
            // Make sure the user actually wanted to delete that park
            if (confirm("Are you sure you want to delete " + adName + "?")) {
                // Put that ID into our hidden form field
                $("#delete-id").val(adId);
                
                // Submit the form
                $("#delete-form").submit();
            }
        });
    })();

</script>
</html>