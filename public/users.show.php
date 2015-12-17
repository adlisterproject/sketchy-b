<?php
require_once '../utils/Auth.php';
require_once '../models/Ad.php';

function pageController(){

	session_start();

	if (!Auth::check()){
		header('Location: auth.login.php');
		exit();
	}

	$username = Auth::user();	
	$user = User::findUserByUsername($username);

	$user_id = $user->attributes['id'];
	$ads_list = Ad::findByUserId($user_id);

	

	return array(
		'username' => $username,
		'ads_list' => $ads_list
		);

}

extract(pageController());

?>

<!DOCTYPE html>
<html>
<?php require_once('../views/header.php') ?> 
<?php require_once('../views/navbar.php') ?>

<body>

	<h1>Hello <?=$username?></h1>
	<h4><a href = "ads.create.php">Create Ad</a></h4>
	<h4><a href = "users.edit.php">Edit Profile</a></h4>

	<?php foreach($ads_list as $ad): ?>
	<div class="col-sm-4 col-lg-4 col-md-4">
        <div class="thumbnail">
            <img src="/img/wagon.jpg" alt="">
            <div class="caption">
            	<!-- make this the price class? -->
                <h4 class="pull-right"> <?= $ad['price'] ?> </h4>
                <h4><a href="ads.show.php?id=<?=$ad['id']?>"> <?= $ad['item_name']?> </a>
                </h4>
                <!-- make a description class here? -->
                <!-- user can only edit ad if they are logged in and it is theirs -->
                <p> <?= $ad['description'] ?> 
                	<form method="GET" action="ads.edit.php">
                		<!-- could use a query string with an anchor tag -->
                		<input type="hidden" name="id" value="<?= $ad['id'] ?>">
                		<input type="submit" value="Edit">
                	</form>
                </p>
            </div>
        </div>
    </div>
	<?php endforeach ?>
</body>

<?php require_once('../views/footer.php') ?>
</html>