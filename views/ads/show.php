<?php

require_once '../utils/Input.php';
require_once '../models/Ad.php';
require_once '../utils/Auth.php';

function pageController(){
    session_start();

    if (!Input::has('id')){
        header('Location: /ads');
        exit();
    }

    if (Auth::check()){
        $username = Auth::user();
        $user = User::findUserByUsername($username);
        $userid = $user->attributes['id'];
    } else {
        $userid = null;
    }
    

    $adid = Input::get('id');
    $ad = Ad::find($adid);

    $aduserid = $ad->attributes['user_id'];
    $item_name = $ad->attributes['item_name'];
    $price = $ad->attributes['price'];
    $description = $ad->attributes['description'];
    $image_path=$ad->attributes['image_path'];
    $contact = $ad->attributes['contact'];

    return array(
        'adid' => $adid,
        'userid' => $userid,
        'aduserid' => $aduserid,
        'item_name' => $item_name,
        'price' => $price,
        'description' => $description,
        'image_path'=>$image_path,
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
	<div class="row">
        <div class="col-lg-12">
            <h1 class="page-header"><?=$item_name?>
                <small><?=$contact?></small>
            </h1>
        </div>
    </div>

    <div class="row">
        <div class="col-md-8">
            <img class="img-responsive" src="/<?= $image_path?>" alt="">
        </div>

        <div class="col-md-4">
            <h2>Description</h2>
            <h3><?=$description?></h3>
            <h3>$<?=$price?></h3>
            <?php 
            if (Auth::check()):
                if ($userid==$aduserid):
                ?>
                    <label><a href="/ads/edit?id=<?=$adid?>">Edit</a></label>
                <?php endif;
            endif;
            ?>
        </div>
    </div>

</body>

<?php require_once('../views/footer.php') ?>
</html>