<?php

require '../models/Ad.php';
require '../utils/Auth.php';
session_start();
$ads_list = Ad::all();
?>


<html>
<?php require_once('../views/header.php'); ?>
<?php require_once ('../views/navbar.php');?>

<body>
	<?php foreach($ads_list as $ad): ?>
	<div class="col-sm-4 col-lg-4 col-md-4">
        <div class="thumbnail">
            <img src="<?=$ad['image_path']?>" alt="">
            <div class="caption">
            	<!-- make this the price class? -->
                <h4 class="pull-right"> <?= $ad['price'] ?> </h4>
                <h4><a href="/ads/show?id=<?=$ad['id']?>"> <?= $ad['item_name']?></a>
                </h4>
                <!-- make a description class here? -->
                <p><?=$ad['description']?></p>
                <!-- user can only edit ad if they are logged in and it is theirs -->
            </div>
        </div>
    </div>
	<?php endforeach ?>

<?php require_once ('../views/footer.php');?>  
</body>
</html>

