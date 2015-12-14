<?php
?>

<!DOCTYPE html>
<html>
<?php require_once('../views/header.php') ?> 
<?php require_once('../views/navbar.php') ?>

<body>
	<!-- placeholders until we style with css -->
	<br>
	<br>
	<br>
	<br>
	<h1>Welcome to Sketchy-B!</h1>
	<div id = "user_create">
		<a href="users.create.php">Create a Profile!</a>
	</div>

	<div class="col-sm-4 col-lg-4 col-md-4">
        <div class="thumbnail">
            <img src="/img/wagon.jpg" alt="">
            <div class="caption">
            	<!-- make this the price class? -->
                <h4 class="pull-right">$24.99</h4>
                <h4><a href="ads.show.php">First Product</a>
                </h4>
                <!-- make a description class here? -->
                <!-- user can only edit ad if they are logged in and it is theirs -->
                <p>Brief description of the thing <a href="ads.edit.php">Edit Ad</a></p>
            </div>
        </div>
    </div>

    <div class="col-sm-4 col-lg-4 col-md-4">
        <div class="thumbnail">
            <img src="/img/wagon.jpg" alt="">
            <div class="caption">
            	<!-- make this the price class? -->
                <h4 class="pull-right">$24.99</h4>
                <h4><a href="ads.show.php">Second Product</a>
                </h4>
                <!-- make a description class here? -->
                <!-- user can only edit ad if they are logged in and it is theirs -->
                <p>Brief description of the thing <a href="ads.edit.php">Edit Ad</a></p>
            </div>
        </div>
    </div>

    <div class="col-sm-4 col-lg-4 col-md-4">
        <div class="thumbnail">
            <img src="/img/wagon.jpg" alt="">
            <div class="caption">
            	<!-- make this the price class? -->
                <h4 class="pull-right">$24.99</h4>
                <h4><a href="ads.show.php">Third Product</a>
                </h4>
                <!-- make a description class here? -->
                <!-- user can only edit ad if they are logged in and it is theirs -->
                <p>Brief description of the thing <a href="ads.edit.php">Edit Ad</a></p>
            </div>
        </div>
    </div>

    <div class="col-sm-4 col-lg-4 col-md-4">
        <div class="thumbnail">
            <img src="/img/wagon.jpg" alt="">
            <div class="caption">
            	<!-- make this the price class? -->
                <h4 class="pull-right">$24.99</h4>
                <h4><a href="ads.show.php">Fourth Product</a>
                </h4>
                <!-- make a description class here? -->
                <!-- user can only edit ad if they are logged in and it is theirs -->
                <p>Brief description of the thing <a href="ads.edit.php">Edit Ad</a></p>
            </div>
        </div>
    </div>
	
</body>

<?php require_once('../views/footer.php') ?>
</html>


