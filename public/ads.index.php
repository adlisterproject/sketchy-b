<?php

require '../models/Ad.php';
// require '../database/seeder.php';
// require '../public/ads.create.php';
$ads_list = Ad::all();
?>


<html>
<?php require_once('../views/header.php'); ?>
<?php require_once ("../views/navbar.php");?>

<body>
	<?php foreach($ads_list as $ad): ?>
	<div class="col-sm-4 col-lg-4 col-md-4">
        <div class="thumbnail">
            <img src="/img/wagon.jpg" alt="">
            <div class="caption">
            	<!-- make this the price class? -->
                <h4 class="pull-right"> <?= $ad['price'] ?> </h4>
                <h4><a href="ads.show.php"> <?= $ad['item_name']?> </a>
                </h4>
                <!-- make a description class here? -->
                <!-- user can only edit ad if they are logged in and it is theirs -->
                <p> <?= $ad['description'] ?> <a href="ads.edit.php">Edit Ad</a></p>
            </div>
        </div>
    </div>
	<?php endforeach ?>

    
</body>
</html>

