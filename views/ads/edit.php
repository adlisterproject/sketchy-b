<?php
require_once '../utils/Auth.php';
require_once '../utils/Input.php';
require_once '../utils/ValidateAd.php';
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
			$item_name = ValidateAd::getItemName();
		}

		if (Input::notEmpty('price')){
			$price = ValidateAd::getPrice();	
		}

		if (Input::notEmpty('description')){
			$description = ValidateAd::getDescription();
		}

		if (Input::notEmpty('contact')){
			$contact = ValidateAd::getContact();
		}

		$errors = ValidateAd::getErrors();


		
		if (empty($errors)){
			$ad->attributes['item_name'] = $item_name;	
			$ad->attributes['price'] = $price;
			$ad->attributes['description'] = $description;
			$ad->attributes['contact'] = $contact;
			$ad->attributes['image_path'] = $image_path;
			$ad->save();
		}
	}


	return array(
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
            <img src="/<?=$image_path?>" alt="">
            <div class="caption">
            	<!-- make this the price class? -->
                <h4 class="pull-right"><?=$price?></h4>
                <h4><a href="/ads/show"><?=$item_name?></a>
                </h4>
                <!-- make a description class here? -->
                <!-- user can only edit ad if they are logged in and it is theirs -->
                <p><?=$description?></p>
                <p><?=$contact?></p>
            </div>
        </div>
    </div>

    <form method = "POST">
		<a id = "namebtn"><label>Change Name</label></a>
		<input class = "hidden" type="text" id="item_name" name="item_name" value="<?=$item_name?>">
		<br>
		<a id = "pricebtn"><label>Change Price</label></a>
		<br>
		<input class = "hidden" type="text" id="price" name="price" value = "<?=$price?>">
		<br>
		<a id = "descriptionbtn"><label>Change Description</label></a>
		<br>
		<input class = "hidden" type="textarea" id="description" name="description" value = "<?=$description?>">
		<br>
		<a id = "contactbtn"><label>Change Contact</label></a>
		<br>
		<input class = "hidden" type="text" id="contact" name="contact" value="<?=$contact?>"> 
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
</script>
</html>