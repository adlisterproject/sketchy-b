<?php
require_once '../utils/Auth.php';
require_once '../models/Ad.php';

function pageController(){

	session_start();

	if (!Auth::check()){
		header('Location: /auth/login');
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

	<h1 class="center">Hello <?=$username?></h1>
	<h4 class="center"><a href = "/ads/create">Create Ad</a></h4>
	<h4 class="center"><a href = "/users/edit">Edit Profile</a></h4>

	<?php foreach($ads_list as $ad): ?>
	<div class="col-sm-4 col-lg-4 col-md-4">
        <div class="thumbnail">
            <img src="/<?= $ad['image_path']?>" alt="">
            <div class="caption">
            	<!-- make this the price class? -->
                <h4 class="pull-right"> <?= $ad['price'] ?> </h4>
                <h4><a href="/ads/show?id=<?=$ad['id']?>"> <?= $ad['item_name']?> </a>
                </h4>
                <!-- make a description class here? -->
                <!-- user can only edit ad if they are logged in and it is theirs -->
                <p> <?= $ad['description'] ?> 
                	<a href="/ads/edit?id=<?= $ad['id'] ?>" class="btn btn-default">Edit</a>
                	<!-- <form method="GET" action="/ads/edit">
                		<! could use a query string with an anchor tag -->
                		<!-- <input type="hidden" name="id" value="<?= $ad['id'] ?>">
                		<input type="submit" value="Edit">
                	</form>  -->
                </p>
            </div>
        </div>
    </div>
	<?php endforeach ?>
</body>

<?php require_once('../views/footer.php') ?>
</html>