<?php

require_once '../utils/Auth.php';

?>

<nav class="navbar navbar-default navbar-fixed-top">
  <div class="container">
  	<ul class="nav navbar-nav">
     	<li><a href="/home">Home</a></li>
     	<li><a href="/ads">List All Adds</a></li>
    </ul>
    <ul class="nav navbar-nav navbar-right">
      <?php if(Auth::check()):
      ?>
    	<li><a href="/users">Profile</a></li>
      <?php endif;
      ?>
      <?php if(Auth::check()):
      ?>
    	<li><a href="/auth/logout">Log Out</a></li>
      <?php endif;
      ?>
      <?php if(!Auth::check()): 
      ?>
    	<li><a href="/auth/login">Sign In</a></li>
    <?php endif;
    ?>
    </ul>
  </div>
</nav>