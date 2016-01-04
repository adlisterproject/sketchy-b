<?php

require_once '../utils/Auth.php';

?>

<nav class="navbar navbar-default navbar-fixed-top">
  <div class="container">
  	<ul class="nav navbar-nav">
     	<li><a href="/home">Home</a></li>
     	<li><a href="/ads">List All Adds</a></li>

      <!-- search bar- not functionin yet -->
      <li>
        <form method="GET">
          <input type="text" id="keyword" name="keyword" placeholder="Enter Keyword">
          <input type="submit" name = "search" value = "Search!">
        </form>
      </li>
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