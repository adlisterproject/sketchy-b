<?php
require_once '../utils/Auth.php';
require_once '../utils/Input.php';
require_once '../models/Ad.php';


function pageController(){

	session_start();

	if (!Auth::check()){
		header('Location: auth.login.php');
		exit();
	}



	$username = Auth::user();
	$user = User::findUserByUsername($username);	

	$adid = Input::get('id');
	$ad = Ad::find($adid);

	$item_name = $ad->attributes['item_name'];
	$price = $ad->attributes['price'];
	$description = $ad->attributes['description'];
	$contact = $ad->attributes['contact'];


	return array(
		'username' => $username,
		'item_name' => $item_name,
		'price' => $price,
		'description' => $description,
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
            <img src="/img/wagon.jpg" alt="">
            <div class="caption">
            	<!-- make this the price class? -->
                <h4 class="pull-right"> <?=$price?> </h4>
                <h4><a href="ads.show.php"> <?=$item_name?> </a>
                </h4>
                <!-- make a description class here? -->
                <!-- user can only edit ad if they are logged in and it is theirs -->
                <p> <?=$description?></p>
                <p><?=$contact?></p>
            </div>
        </div>
    </div>
	
</body>

<?php require_once('../views/footer.php') ?>
</html>