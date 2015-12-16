<?php

require_once '../utils/Input.php';
require_once '../models/Ad.php';
function pageController(){

    if (!Input::has('id')){
        header('Location: ads.index.php');
        exit();
    }

    $adid = Input::get('id');
    $ad = Ad::find($adid);

    $item_name = $ad->attributes['item_name'];
    $price = $ad->attributes['price'];
    $description = $ad->attributes['description'];
    $contact = $ad->attributes['contact'];

    return array(
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
	<div class="row">
        <div class="col-lg-12">
            <h1 class="page-header"><?=$item_name?>
                <small><?=$contact?></small>
            </h1>
        </div>
    </div>

    <div class="row">
        <div class="col-md-8">
            <img class="img-responsive" src="/img/wagon.jpg" alt="">
        </div>

        <div class="col-md-4">
            <h2>Description</h2>
            <h3><?=$description?></h3>
            <h3>$<?=$price?></h3>
        </div>
    </div>

</body>

<?php require_once('../views/footer.php') ?>
</html>